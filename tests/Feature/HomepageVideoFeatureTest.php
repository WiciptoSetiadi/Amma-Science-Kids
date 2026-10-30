<?php

namespace Tests\Feature;

use App\Filament\Resources\HomepageVideoResource\Pages\CreateHomepageVideo;
use App\Models\HomepageVideo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class HomepageVideoFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_the_latest_uploaded_video(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('homepage-videos/older.mp4', 'video');
        Storage::disk('public')->put('homepage-videos/latest.webm', 'video');

        HomepageVideo::create([
            'video_path' => 'homepage-videos/older.mp4',
            'created_at' => now()->subMinute(),
            'updated_at' => now()->subMinute(),
        ]);
        HomepageVideo::create([
            'video_path' => 'homepage-videos/latest.webm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee(Storage::disk('public')->url('homepage-videos/latest.webm'))
            ->assertDontSee(Storage::disk('public')->url('homepage-videos/older.mp4'));
    }

    public function test_homepage_keeps_the_existing_video_as_fallback_without_an_upload(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(asset('videos/homepage.mp4'));
    }

    public function test_admin_can_open_the_homepage_video_upload_form(): void
    {
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $this->actingAs($admin)
            ->get('/admin/homepage-videos/create')
            ->assertOk()
            ->assertSee('File Video')
            ->assertSee('Video yang terakhir diperbarui');
    }

    public function test_admin_can_upload_a_video_for_the_homepage(): void
    {
        Storage::fake('public');
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin);

        Livewire::test(CreateHomepageVideo::class)
            ->fillForm([
                'name' => 'Video Eksperimen Sains',
                'video_path' => UploadedFile::fake()->create('science.mp4', 100, 'video/mp4'),
            ])
            ->call('create')
            ->assertHasNoFormErrors()
            ->assertRedirect('/admin/homepage-videos');

        $homepageVideo = HomepageVideo::query()->firstOrFail();

        $this->assertSame('Video Eksperimen Sains', $homepageVideo->name);
        $this->assertSame('homepage-videos/video-eksperimen-sains.mp4', $homepageVideo->video_path);
        Storage::disk('public')->assertExists($homepageVideo->video_path);
    }

    public function test_duplicate_video_names_receive_a_non_random_suffix(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('homepage-videos/video-eksperimen-sains.mp4', 'existing');
        Role::findOrCreate('admin', 'web');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin);

        Livewire::test(CreateHomepageVideo::class)
            ->fillForm([
                'name' => 'Video Eksperimen Sains',
                'video_path' => UploadedFile::fake()->create('science.mp4', 100, 'video/mp4'),
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $homepageVideo = HomepageVideo::query()->firstOrFail();

        $this->assertSame('homepage-videos/video-eksperimen-sains-2.mp4', $homepageVideo->video_path);
        Storage::disk('public')->assertExists($homepageVideo->video_path);
    }
}
