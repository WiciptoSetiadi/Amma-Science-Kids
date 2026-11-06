<?php

namespace Tests\Feature;

use App\Filament\Resources\HomepageContentResource\Pages\EditHomepageContent;
use App\Models\Article;
use App\Models\HomepageContent;
use App\Models\Program;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class HomepageContentFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_uses_the_latest_content_until_admin_configures_selections(): void
    {
        $latestArticle = Article::factory()->create([
            'title' => 'Artikel Terbaru',
            'published_at' => now(),
        ]);
        Program::factory()->create(['title' => 'Program Lama']);
        $latestProgram = Program::factory()->create(['title' => 'Program Terbaru']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee($latestArticle->title)
            ->assertSee($latestProgram->title);
    }

    public function test_homepage_displays_only_the_admin_selected_published_article_and_active_programs(): void
    {
        $selectedArticle = Article::factory()->create([
            'title' => 'Artikel Pilihan Admin',
            'published_at' => now()->subWeek(),
        ]);
        Article::factory()->create([
            'title' => 'Artikel Terbaru Tidak Dipilih',
            'published_at' => now(),
        ]);

        $selectedProgram = Program::factory()->create([
            'title' => 'Program Pilihan Admin',
            'is_active' => true,
        ]);
        $inactiveProgram = Program::factory()->create([
            'title' => 'Program Tidak Aktif',
            'is_active' => false,
        ]);
        Program::factory()->create(['title' => 'Program Terbaru Tidak Dipilih']);

        HomepageContent::query()->firstOrFail()->update([
            'featured_article_id' => $selectedArticle->id,
            'featured_program_one_id' => $selectedProgram->id,
            'featured_program_two_id' => $inactiveProgram->id,
            'is_configured' => true,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee($selectedArticle->title)
            ->assertSee($selectedProgram->title)
            ->assertDontSee('Artikel Terbaru Tidak Dipilih')
            ->assertDontSee('Program Tidak Aktif')
            ->assertDontSee('Program Terbaru Tidak Dipilih');
    }

    public function test_admin_can_open_homepage_content_settings(): void
    {
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        Article::factory()->create(['title' => 'Pilihan Artikel']);
        Program::factory()->create(['title' => 'Pilihan Program']);

        $this->actingAs($admin)
            ->get('/admin/homepage-contents/1/edit')
            ->assertOk()
            ->assertSee('Artikel Pilihan')
            ->assertSee('Program Unggulan 1')
            ->assertSee('Pilihan Artikel')
            ->assertSee('Pilihan Program');
    }

    public function test_admin_can_save_homepage_content_selections(): void
    {
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin);

        $article = Article::factory()->create();
        $firstProgram = Program::factory()->create();
        $secondProgram = Program::factory()->create();
        $homepageContent = HomepageContent::query()->firstOrFail();

        Livewire::test(EditHomepageContent::class, ['record' => $homepageContent->getRouteKey()])
            ->fillForm([
                'featured_article_id' => $article->id,
                'featured_program_one_id' => $firstProgram->id,
                'featured_program_two_id' => $secondProgram->id,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('homepage_contents', [
            'id' => $homepageContent->id,
            'featured_article_id' => $article->id,
            'featured_program_one_id' => $firstProgram->id,
            'featured_program_two_id' => $secondProgram->id,
            'is_configured' => true,
        ]);
    }

    public function test_admin_cannot_select_the_same_program_twice(): void
    {
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin);

        $program = Program::factory()->create();
        $homepageContent = HomepageContent::query()->firstOrFail();

        Livewire::test(EditHomepageContent::class, ['record' => $homepageContent->getRouteKey()])
            ->fillForm([
                'featured_program_one_id' => $program->id,
                'featured_program_two_id' => $program->id,
            ])
            ->call('save')
            ->assertHasFormErrors([
                'featured_program_one_id',
                'featured_program_two_id',
            ]);
    }
}
