<?php

namespace Tests\Feature;

use App\Models\ti_igniter_coupon_categories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponCategoryTest extends TestCase
{ use RefreshDatabase;

    /** @test */
    public function test_create_a_coupon_category()
    {
        $couponCategory = ti_igniter_coupon_categories::create([
            'name' => 'Test Category',
        ]);

        $this->assertNotNull($couponCategory);
        $this->assertEquals('Test Category', $couponCategory->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_update_a_coupon_category()
    {
        $couponCategory = ti_igniter_coupon_categories::create([
            'name' => 'Test Category',
        ]);

        $couponCategory->update(['name' => 'Updated Category']);

        $this->assertEquals('Updated Category', $couponCategory->name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_delete_a_coupon_category()
    {
        $couponCategory = ti_igniter_coupon_categories::create([
            'name' => 'Test Category',
        ]);

        $couponCategory->delete();

        $this->assertDatabaseMissing('ti_igniter_coupon_categories', ['id' => $couponCategory->id]);
    }
}
