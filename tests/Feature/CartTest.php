<?php

namespace Tests\Feature;

use App\Models\ti_igniter_cart_cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_create_cart()
    {
        $cart = ti_igniter_cart_cart::create([
            'identifier' => 'cart_identifier',
            'instance' => 'cart_instance',
            'data' => json_encode(['key' => 'value']),
        ]);

        $this->assertNotNull($cart);
        $this->assertEquals('cart_identifier', $cart->identifier);
        // Add more assertions as needed
    }


    public function test_update_a_cart()
    {
        $cart = ti_igniter_cart_cart::create([
            'identifier' => 'cart_identifier',
            'instance' => 'cart_instance',
            'data' => json_encode(['key' => 'value']),
        ]);

        $cart->update(['instance' => 'updated_instance']);

        $this->assertEquals('updated_instance', $cart->instance);
    }



    public function test_delete_a_cart()
    {
        $cart = ti_igniter_cart_cart::create([
            'identifier' => 'cart_identifier',
            'instance' => 'cart_instance',
            'data' => json_encode(['key' => 'value']),
        ]);

        $cart->delete();

        $this->assertDatabaseMissing('ti_igniter_cart_carts', ['id' => $cart->id]);
    }
}
