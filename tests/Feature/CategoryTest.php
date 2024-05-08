<?php

namespace Tests\Feature;

use App\Models\ti_categories;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_add_category()
    {
        $category = ti_categories::create([
            'name' => 'Test Category',
            'description' => 'This is a test category',
            'priority' => 2,
            'status' => 1,
            'permalink_slug' => 'test-category'
        ]);

        $this->assertInstanceOf(ti_categories::class, $category);
        $this->assertEquals('Test Category', $category->name);
    }


    /** @test */
    public function test_update_category()
    {
        $tiCategory = ti_categories::create([
            'name' => 'Test Category',
            'description' => 'This is a test category',
            'priority' => 2,
            'status' => 1,
            'permalink_slug' => 'test-category'
        ]);

        $tiCategory->update(['name' => 'Updated Test Category']);

        $this->assertEquals('Updated Test Category', $tiCategory->fresh()->name);
    }

    /** @test */
    public function test_delete_category()
    {
        $tiCategory = ti_categories::create([
            'name' => 'Test Category',
            'description' => 'This is a test category',
            'priority' => 2,
            'status' => 1,
            'permalink_slug' => 'test-category'
        ]);

        $tiCategory->delete();

        $this->expectException(ModelNotFoundException::class);
        ti_categories::findOrFail($tiCategory->id);
    }
}
