<?php

namespace Tests\Feature;

use App\Models\ti_tables;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TiTablesTest extends TestCase
{
    use RefreshDatabase;


    public function test_can_create_table()
    {
        $tableData = [
            'table_name' => 'Table 1',
            'min_capacity' => 2,
            'max_capacity' => 4,
            'table_status' => 1,
            'extra_capacity' => 1,
            'is_joinable' => 1,
            'priority' => 0,
        ];

        $table = ti_tables::create($tableData);

        $this->assertInstanceOf(ti_tables::class, $table);
        $this->assertEquals($tableData['table_name'], $table->table_name);
        // Add assertions for other fields...
    }

    /**
     * Test updating an existing table.
     *
     * @return void
     */
    public function test_can_update_table()
    {
        $table = ti_tables::create([
            'table_name' => 'Table 1',
            'min_capacity' => 2,
            'max_capacity' => 4,
            'table_status' => 1,
            'extra_capacity' => 1,
            'is_joinable' => 1,
            'priority' => 0,
        ]);

        $newTableName = 'Updated Table';

        $table->update(['table_name' => $newTableName]);

        $this->assertEquals($newTableName, $table->fresh()->table_name);
        // Add assertions for other fields...
    }

    /**
     * Test deleting a table.
     *
     * @return void
     */
    public function test_can_delete_table()
    {
        $table = ti_tables::create([
            'table_name' => 'Table 1',
            'min_capacity' => 2,
            'max_capacity' => 4,
            'table_status' => 1,
            'extra_capacity' => 1,
            'is_joinable' => 1,
            'priority' => 0,
        ]);

        $table->delete();

        $this->assertDeleted($table);
    }
}
