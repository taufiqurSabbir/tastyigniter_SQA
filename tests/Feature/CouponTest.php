<?php

namespace Tests\Feature;

use App\Models\ti_igniter_coupons;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_add_coupon()
    {
        $coupon = ti_igniter_coupons::create([
            'name' => 'Test Coupon',
            'code' => 'TEST123',
            'type' => 'F',
            'discount' => 10.00,
            'min_total' => 50.00,
            'description' => 'This is a test coupon',
            'status' => 1,

        ]);

        $this->assertNotNull($coupon);
        $this->assertEquals('Test Coupon', $coupon->name);

    }

    public function update_coupon()
    {
        $coupon = ti_igniter_coupons::create([
            'name' => 'Test Coupon',
            'code' => 'TEST123',
            'type' => 'F',
            'discount' => 10.00,
            'min_total' => 50.00,
            'description' => 'This is a test coupon',
            'status' => 1,
        ]);

        $coupon->update(['name' => 'Updated Coupon']);

        $this->assertEquals('Updated Coupon', $coupon->name);
        // Add more assertions as needed
    }

    public function test_delete_coupon()
    {
        $coupon = ti_igniter_coupons::create([
            'name' => 'Test Coupon',
            'code' => 'TEST123',
            'type' => 'F',
            'discount' => 10.00,
            'min_total' => 50.00,
            'description' => 'This is a test coupon',
            'status' => 1,
        ]);

        $coupon->delete();

        $this->assertDatabaseMissing('ti_igniter_coupons', ['id' => $coupon->id]);
    }
}
