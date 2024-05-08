<?php

namespace Tests\Feature;

use App\Models\ti_orders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_an_order()
    {
        $order = ti_orders::create([
            'customer_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'location_id' => 1,
            'cart' => '{"product_id": 1, "quantity": 2}', // Example cart JSON data
            'total_items' => 2,
            'comment' => 'Test comment',
            'payment' => 'Cash',
            'order_type' => 'Delivery',
            'order_time' => '13:00:00',
            'order_date' => '2024-05-08',
            'status_id' => 1,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            // Add more fields as needed
        ]);

        $this->assertNotNull($order);
        $this->assertEquals('John', $order->first_name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_it_can_update_an_order()
    {
        $order = ti_orders::create([
            'customer_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'location_id' => 1,
            'cart' => '{"product_id": 1, "quantity": 2}', // Example cart JSON data
            'total_items' => 2,
            'comment' => 'Test comment',
            'payment' => 'Cash',
            'order_type' => 'Delivery',
            'order_time' => '13:00:00',
            'order_date' => '2024-05-08',
            'status_id' => 1,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            // Add more fields as needed
        ]);

        $order->update(['first_name' => 'Jane']);

        $this->assertEquals('Jane', $order->first_name);
        // Add more assertions as needed
    }

    /** @test */
    public function test_it_can_delete_an_order()
    {
        $order = ti_orders::create([
            'customer_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'location_id' => 1,
            'cart' => '{"product_id": 1, "quantity": 2}', // Example cart JSON data
            'total_items' => 2,
            'comment' => 'Test comment',
            'payment' => 'Cash',
            'order_type' => 'Delivery',
            'order_time' => '13:00:00',
            'order_date' => '2024-05-08',
            'status_id' => 1,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            // Add more fields as needed
        ]);

        $order->delete();

        $this->assertDatabaseMissing('ti_orders', ['order_id' => $order->order_id]);
    }
}
