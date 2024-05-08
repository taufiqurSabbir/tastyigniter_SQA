<?php

namespace Tests\Feature;

use App\Models\FrontendBanner;
use App\Models\ti_igniter_frontend_banners;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontendBannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_a_frontend_banner()
    {
        $frontendBanner = ti_igniter_frontend_banners::create([
            'name' => 'Test Banner',
            'type' => 'image',
            'click_url' => 'https://example.com',
            'language_id' => 1,
            'alt_text' => 'Test Banner Alt Text',
            'image_code' => '<img src="test.jpg" alt="Test Banner Image">',
            'custom_code' => '<div>Custom Banner Content</div>',
            'status' => 1,
        ]);

        $this->assertNotNull($frontendBanner);
        $this->assertEquals('Test Banner', $frontendBanner->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_update_a_frontend_banner()
    {
        $frontendBanner = ti_igniter_frontend_banners::create([
            'name' => 'Test Banner',
            'type' => 'image',
            'click_url' => 'https://example.com',
            'language_id' => 1,
            'alt_text' => 'Test Banner Alt Text',
            'image_code' => '<img src="test.jpg" alt="Test Banner Image">',
            'custom_code' => '<div>Custom Banner Content</div>',
            'status' => 1,
        ]);

        $frontendBanner->update(['name' => 'Updated Banner']);

        $this->assertEquals('Updated Banner', $frontendBanner->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_delete_a_frontend_banner()
    {
        $frontendBanner = ti_igniter_frontend_banners::create([
            'name' => 'Test Banner',
            'type' => 'image',
            'click_url' => 'https://example.com',
            'language_id' => 1,
            'alt_text' => 'Test Banner Alt Text',
            'image_code' => '<img src="test.jpg" alt="Test Banner Image">',
            'custom_code' => '<div>Custom Banner Content</div>',
            'status' => 1,
        ]);

        $frontendBanner->delete();

        $this->assertDatabaseMissing('ti_igniter_frontend_banners', ['banner_id' => $frontendBanner->banner_id]);
    }
}
