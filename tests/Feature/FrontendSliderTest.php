<?php

namespace Tests\Feature;

use App\Models\ti_igniter_frontend_banners;
use App\Models\ti_igniter_frontend_sliders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontendSliderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_create_frontend_slider()
    {
        $frontendSlider = ti_igniter_frontend_sliders::create([
            'name' => 'Test Slider',
            'code' => 'SLIDER123',
            'metadata' => json_encode(['key' => 'value']), // Assuming metadata is JSON encoded
        ]);

        $this->assertNotNull($frontendSlider);
        $this->assertEquals('Test Slider', $frontendSlider->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_update_a_frontend_slider()
    {
        $frontendSlider = ti_igniter_frontend_sliders::create([
            'name' => 'Test Slider',
            'code' => 'SLIDER123',
            'metadata' => json_encode(['key' => 'value']), // Assuming metadata is JSON encoded
        ]);

        $frontendSlider->update(['name' => 'Updated Slider']);

        $this->assertEquals('Updated Slider', $frontendSlider->name);
        // Add more assertions as needed
    }

    /** @test */
    public function testdelete_a_frontend_slider()
    {
        $frontendSlider = ti_igniter_frontend_sliders::create([
            'name' => 'Test Slider',
            'code' => 'SLIDER123',
            'metadata' => json_encode(['key' => 'value']), // Assuming metadata is JSON encoded
        ]);

        $frontendSlider->delete();

        $this->assertDatabaseMissing('ti_igniter_frontend_sliders', ['id' => $frontendSlider->id]);
    }
}
