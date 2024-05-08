<?php

namespace Tests\Feature;

use App\Models\ti_location_areas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationAreaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_a_location_area()
    {
        $locationArea = ti_location_areas::create([
            'location_id' => 1,
            'name' => 'Test Area',
            'type' => 'Type A',
            'boundaries' => '[{"lat": 123, "lng": 456}, {"lat": 789, "lng": 123}]', // Example JSON boundaries
            'conditions' => 'Test conditions',
            'color' => '#FF0000',
            'is_default' => 1,
            'priority' => 1,
        ]);

        $this->assertNotNull($locationArea);
        $this->assertEquals('Test Area', $locationArea->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_it_can_update_a_location_area()
    {
        $locationArea = ti_location_areas::create([
            'location_id' => 1,
            'name' => 'Test Area',
            'type' => 'Type A',
            'boundaries' => '[{"lat": 123, "lng": 456}, {"lat": 789, "lng": 123}]', // Example JSON boundaries
            'conditions' => 'Test conditions',
            'color' => '#FF0000',
            'is_default' => 1,
            'priority' => 1,
        ]);

        $locationArea->update(['name' => 'Updated Area']);

        $this->assertEquals('Updated Area', $locationArea->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_it_can_delete_a_location_area()
    {
        $locationArea = ti_location_areas::create([
            'location_id' => 1,
            'name' => 'Test Area',
            'type' => 'Type A',
            'boundaries' => '[{"lat": 123, "lng": 456}, {"lat": 789, "lng": 123}]', // Example JSON boundaries
            'conditions' => 'Test conditions',
            'color' => '#FF0000',
            'is_default' => 1,
            'priority' => 1,
        ]);

        $locationArea->delete();

        $this->assertDatabaseMissing('ti_location_areas', ['id' => $locationArea->id]);
    }

}
