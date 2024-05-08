<?php

namespace Tests\Feature;

use App\Models\ti_reservations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_a_reservation()
    {
        $reservation = ti_reservations::create([
            'location_id' => 'location_id_value',
            'table_id' => 'table_id_value',
            'guest_num' => 4,
            'occasion_id' => null,
            'customer_id' => null,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'comment' => 'Test comment',
            'reserve_time' => '13:00:00',
            'reserve_date' => '2024-05-08',
            'assignee_id' => null,
            'assignee_group_id' => null,
            'notify' => null,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            'status_id' => 1,
            'hash' => null,
            'duration' => null,
            'processed' => null,

        ]);

        $this->assertNotNull($reservation);
        $this->assertEquals('John', $reservation->first_name);

    }

    /** @test */
    public function test_it_can_update_a_reservation()
    {
        $reservation = ti_reservations::create([
            'location_id' => 'location_id_value',
            'table_id' => 'table_id_value',
            'guest_num' => 4,
            'occasion_id' => null,
            'customer_id' => null,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'comment' => 'Test comment',
            'reserve_time' => '13:00:00',
            'reserve_date' => '2024-05-08',
            'assignee_id' => null,
            'assignee_group_id' => null,
            'notify' => null,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            'status_id' => 1,
            'hash' => null,
            'duration' => null,
            'processed' => null,

        ]);

        $reservation->update(['first_name' => 'Jane']);

        $this->assertEquals('Jane', $reservation->first_name);

    }

    /** @test */
    public function test_it_can_delete_a_reservation()
    {
        $reservation = ti_reservations::create([
            'location_id' => 'location_id_value',
            'table_id' => 'table_id_value',
            'guest_num' => 4,
            'occasion_id' => null,
            'customer_id' => null,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'comment' => 'Test comment',
            'reserve_time' => '13:00:00',
            'reserve_date' => '2024-05-08',
            'assignee_id' => null,
            'assignee_group_id' => null,
            'notify' => null,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            'status_id' => 1,
            'hash' => null,
            'duration' => null,
            'processed' => null,

        ]);

        $reservation->delete();

        $this->assertDatabaseMissing('ti_reservations', ['id' => $reservation->id]);
    }
}
