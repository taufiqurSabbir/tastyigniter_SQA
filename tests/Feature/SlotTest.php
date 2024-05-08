<?php

namespace Tests\Feature;

use App\Models\ti_slot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SlotTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_slot(): void
    {
        $slotData = [
            'name' => 'Test Slot',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'table_id' => '1',
            'status' => 1,
        ];

        ti_slot::create($slotData);


        $this->assertDatabaseHas('ti_slots', $slotData);
    }


    public function test_edit_slot(): void
    {
        $slot = ti_slot::create([
            'name' => 'Test Slot',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'table_id' => '1',
            'status' => 1,
        ]);

        // Modify the slot data
        $updatedSlotData = [
            'name' => 'Updated Slot Name',
            'start_time' => '10:00:00',
            'end_time' => '11:00:00',
            'table_id' => '2',
            'status' => 1,
        ];

        $slot->update($updatedSlotData);

        $updatedSlot = ti_slot::find($slot->id);

        // Assert that the updated slot data matches the modified data
        $this->assertEquals($updatedSlotData['name'], $updatedSlot->name);
        $this->assertEquals($updatedSlotData['start_time'], $updatedSlot->start_time);
        $this->assertEquals($updatedSlotData['end_time'], $updatedSlot->end_time);
        $this->assertEquals($updatedSlotData['table_id'], $updatedSlot->table_id);
    }


    public function test_remove_slot(): void
    {
        $slot = ti_slot::create([
            'name' => 'Test Slot',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'table_id' => '1',
            'status' => 1,
        ]);


        $slot->delete();


        $removedSlot = ti_slot::find($slot->id);


        $this->assertNull($removedSlot);
    }

    public function test_count_available_slots(): void
    {

        ti_slot::create([
            'name' => 'Available Slot 1',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'table_id' => '1',
            'status' => 1,
        ]);

        ti_slot::create([
            'name' => 'Available Slot 2',
            'start_time' => '10:00:00',
            'end_time' => '11:00:00',
            'table_id' => '1',
            'status' => 1,
        ]);


        ti_slot::create([
            'name' => 'Booked Slot 1',
            'start_time' => '11:00:00',
            'end_time' => '12:00:00',
            'table_id' => '1',
            'status' => 0,
        ]);

        ti_slot::create([
            'name' => 'Booked Slot 2',
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'table_id' => '1',
            'status' => 0,
        ]);


        $availableSlotCount = ti_slot::where('status', 0)->count();



        $this->assertEquals(2, $availableSlotCount);


    }




}
