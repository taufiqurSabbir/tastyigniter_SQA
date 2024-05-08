<?php

namespace Tests\Feature;

use App\Models\ti_reservation_tables;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTable extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_reservation_table()
    {
        $tableData = [
            'table_id' => 'table_001',
        ];

        $reservationTable = ti_reservation_tables::create($tableData);

        $this->assertInstanceOf(TiReservationTable::class, $reservationTable);
        $this->assertEquals($tableData['table_id'], $reservationTable->table_id);
    }


    public function test_can_update_reservation_table()
    {
        $reservationTable = ti_reservation_tables::create([
            'table_id' => 'table_001',
        ]);

        $newTableId = 'table_002';

        $reservationTable->update(['table_id' => $newTableId]);

        $this->assertEquals($newTableId, $reservationTable->fresh()->table_id);
    }


    public function test_can_delete_reservation_table()
    {
        $reservationTable = ti_reservation_tables::create([
            'table_id' => 'table_001',
        ]);

        $reservationTable->delete();

        $this->assertDatabaseMissing('ti_reservation_tables', [
            'id' => $reservationTable->id,
        ]);
    }
}
