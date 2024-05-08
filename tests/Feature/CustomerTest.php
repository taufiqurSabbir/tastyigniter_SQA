<?php

namespace Tests\Feature;

use App\Models\ti_customers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_customer_creation()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
           'status'=>1,
            'last_location_area'=>'Dhaka'
        ];

        $customer = ti_customers::create($data);

        $this->assertInstanceOf(ti_customers::class, $customer);
    }

    public function test_customer_update()
    {

        $customer = ti_customers::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'status' => 1,
            'last_location_area' => 'Dhaka'
        ]);

        $updateData = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'password' => 'newpassword',
            'status' => 0,
            'last_location_area' => 'New York'
        ];

        $customer->update($updateData);


        $updatedCustomer = ti_customers::find($customer->id);


        $this->assertEquals($updateData['first_name'], $updatedCustomer->first_name);
        $this->assertEquals($updateData['last_name'], $updatedCustomer->last_name);
        $this->assertEquals($updateData['email'], $updatedCustomer->email);
        $this->assertEquals($updateData['password'], $updatedCustomer->password);
        $this->assertEquals($updateData['status'], $updatedCustomer->status);
        $this->assertEquals($updateData['last_location_area'], $updatedCustomer->last_location_area);
    }

    public function test_customer_deletion()
    {

        $customer = ti_customers::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'status' => 1,
            'last_location_area' => 'Dhaka'
        ]);


        $customer->delete();


        $deletedCustomer = ti_customers::find($customer->id);


        $this->assertNull($deletedCustomer);
    }

    public function test_customer_status_disable()
    {

        $customer = ti_customers::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'status' => 1,
            'last_location_area' => 'Dhaka'
        ]);


        $customer->update(['status' => 0]);


        $updatedCustomer = ti_customers::find($customer->id);


        $this->assertEquals(0, $updatedCustomer->status);
    }



}
