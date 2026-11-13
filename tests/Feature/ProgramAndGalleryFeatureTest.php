<?php

namespace Tests\Feature;

use App\Filament\Resources\ProgramResource\Pages\EditProgram;
use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ProgramAndGalleryFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_jelajahi_program_redirects_to_program_page(): void
    {
        $response = $this->get('/jelajahi-program');

        $response->assertRedirect('/program');
    }

    public function test_program_catalog_filters_by_category(): void
    {
        Program::factory()->create([
            'title' => 'Program Robotika Cilik',
            'category' => 'Program Anak',
            'is_active' => true,
        ]);

        Program::factory()->create([
            'title' => 'Festival Sains Seru',
            'category' => 'Event Festival',
            'is_active' => true,
        ]);

        $response = $this->get('/program?kategori=Program+Anak');

        $response->assertStatus(200);
        $response->assertSee('Program Robotika Cilik');
        $response->assertDontSee('Festival Sains Seru');
    }

    public function test_program_catalog_and_detail_display_program_date_range(): void
    {
        $program = Program::factory()->create([
            'title' => 'Program dengan Periode',
            'start_date' => '2026-11-10',
            'end_date' => '2026-11-20',
        ]);

        $this->get(route('program'))
            ->assertOk()
            ->assertSee('10/11/2026 - 20/11/2026');

        $this->get(route('program.detail', $program->slug))
            ->assertOk()
            ->assertSee('Periode 10/11/2026 - 20/11/2026');
    }

    public function test_admin_can_save_program_date_range(): void
    {
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin);

        $program = Program::factory()->create();

        Livewire::test(EditProgram::class, ['record' => $program->getRouteKey()])
            ->fillForm([
                'start_date' => '2026-11-10',
                'end_date' => '2026-11-20',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $program->refresh();

        $this->assertSame('2026-11-10', $program->start_date->format('Y-m-d'));
        $this->assertSame('2026-11-20', $program->end_date->format('Y-m-d'));
    }

    public function test_admin_must_provide_a_complete_program_date_range(): void
    {
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin);

        $program = Program::factory()->create();

        Livewire::test(EditProgram::class, ['record' => $program->getRouteKey()])
            ->fillForm([
                'start_date' => '2026-11-20',
                'end_date' => '2026-11-10',
            ])
            ->call('save')
            ->assertHasFormErrors([
                'end_date' => 'after_or_equal',
            ]);

        Livewire::test(EditProgram::class, ['record' => $program->getRouteKey()])
            ->fillForm([
                'start_date' => '2026-11-10',
            ])
            ->call('save')
            ->assertHasFormErrors([
                'end_date' => 'required_with',
            ]);
    }

    public function test_program_catalog_filters_by_target_age(): void
    {
        Program::factory()->create([
            'title' => 'Program Balita Sains',
            'target_age' => 'TK/RA',
            'is_active' => true,
        ]);

        Program::factory()->create([
            'title' => 'Program Tingkat Lanjut',
            'target_age' => 'SD/MI',
            'is_active' => true,
        ]);

        $response = $this->get('/program?usia[]=TK/RA');

        $response->assertStatus(200);
        $response->assertSee('Program Balita Sains');
        $response->assertDontSee('Program Tingkat Lanjut');
    }

    public function test_gallery_filters_by_category(): void
    {
        Gallery::factory()->create([
            'title' => 'Eksperimen Letusan Gunung',
            'category' => 'Eksperimen',
        ]);

        Gallery::factory()->create([
            'title' => 'Kunjungan Sekolah Ceria',
            'category' => 'Roadshow',
        ]);

        $response = $this->get('/galeri?kategori=Eksperimen');

        $response->assertStatus(200);
        $response->assertSee('Eksperimen Letusan Gunung');
        $response->assertDontSee('Kunjungan Sekolah Ceria');
    }

    public function test_gallery_ajax_load_more_returns_json_structure(): void
    {
        Gallery::factory()->count(8)->create([
            'category' => 'Eksperimen',
        ]);

        $response = $this->getJson('/galeri?page=1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'items' => [
                '*' => ['id', 'title', 'category', 'image', 'description'],
            ],
            'has_more',
            'current_page',
            'last_page',
            'total',
        ]);

        $this->assertTrue($response->json('has_more'));
    }

    public function test_article_page_filters_by_category(): void
    {
        $category1 = Category::create(['name' => 'Fisika Cilik', 'slug' => 'fisika-cilik']);
        $category2 = Category::create(['name' => 'Biologi Seru', 'slug' => 'biologi-seru']);

        Article::create([
            'title' => 'Eksperimen Gravitasi',
            'slug' => 'eksperimen-gravitasi',
            'category_id' => $category1->id,
            'content' => 'Konten eksperimen',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'Morfologi Bunga',
            'slug' => 'morfologi-bunga',
            'category_id' => $category2->id,
            'content' => 'Konten biologi',
            'is_published' => true,
        ]);

        $response = $this->get('/artikel?kategori=fisika-cilik');

        $response->assertStatus(200);
        $response->assertSee('Eksperimen Gravitasi');
        $response->assertDontSee('Morfologi Bunga');
    }

    public function test_article_ajax_load_more_returns_json_structure(): void
    {
        $category = Category::create(['name' => 'Umum', 'slug' => 'umum']);

        for ($i = 1; $i <= 8; $i++) {
            Article::create([
                'title' => "Artikel {$i}",
                'slug' => "artikel-{$i}",
                'category_id' => $category->id,
                'content' => 'Konten',
                'is_published' => true,
            ]);
        }

        $response = $this->getJson('/artikel?page=1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'items' => [
                '*' => ['id', 'title', 'slug', 'url', 'category_name', 'image', 'excerpt', 'date'],
            ],
            'has_more',
            'current_page',
            'last_page',
            'total',
        ]);

        $this->assertTrue($response->json('has_more'));
    }
}
