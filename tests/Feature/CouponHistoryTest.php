<?php

namespace Tests\Feature;

use App\Models\ti_igniter_coupons_history;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponHistoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_create_a_coupon_history()
    {
        $couponHistory = ti_igniter_coupons_history::create([
            'code' => 'TEST123',
            'min_total' => 50.00,
            'amount' => 10.00,
            'status' => 1,
        ]);

        $this->assertNotNull($couponHistory);
        $this->assertEquals('TEST123', $couponHistory->code);
        // Add more assertions as needed
    }

    /** @test */
    public function test_update_a_coupon_history()
    {
        $couponHistory = ti_igniter_coupons_history::create([
            'code' => 'TEST123',
            'min_total' => 50.00,
            'amount' => 10.00,
            'status' => 1,
        ]);

        $couponHistory->update(['status' => 0]);

        $this->assertEquals(0, $couponHistory->status);
        // Add more assertions as needed
    }

    /** @test */
    public function test_delete_a_coupon_history()
    {
        $couponHistory = ti_igniter_coupons_history::create([
            'code' => 'TEST123',
            'min_total' => 50.00,
            'amount' => 10.00,
            'status' => 1,
        ]);

        $couponHistory->delete();

        $this->assertDatabaseMissing('ti_igniter_coupons_histories', ['id' => $couponHistory->id]);
    }

}
