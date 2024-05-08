<?php

namespace Tests\Feature;

use App\Models\ti_locations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_a_location()
    {
        $location = ti_locations::create([
            'location_name' => 'Test Location',
            'location_email' => 'test@example.com',
            'description' => 'Test Location Description',

        ]);

        $this->assertNotNull($location);
        $this->assertEquals('Test Location', $location->location_name);

    }

    /** @test */
    public function test_it_can_update_a_location()
    {
        $location = ti_locations::create([
            'location_name' => 'Test Location',
            'location_email' => 'test@example.com',
            'description' => 'Test Location Description',

        ]);

        $location->update(['location_name' => 'Updated Location']);

        $this->assertEquals('Updated Location', $location->location_name);

    }

    /** @test */
    public function test_it_can_delete_a_location()
    {
        $location = ti_locations::create([
            'location_name' => 'Test Location',
            'location_email' => 'test@example.com',
            'description' => 'Test Location Description',

        ]);

        $location->delete();

        $this->assertDatabaseMissing('ti_locations', ['id' => $location->id]);
    }
}
