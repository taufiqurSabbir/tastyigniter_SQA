<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAddingStaffMember()
    {

        $staffId = 123;
        $username = 'staff_member';
        $password = bcrypt('password123');
        $superUser = 0;
        $isActivated = 1;


        $user = User::create([
            'staff_id' => $staffId,
            'username' => $username,
            'password' => $password,
            'super_user' => $superUser,
            'is_activated' => $isActivated,
        ]);


        $savedUser = User::find($user->id);


        $this->assertNotNull($savedUser);
        $this->assertEquals($staffId, $savedUser->staff_id);
        $this->assertEquals($username, $savedUser->username);

    }

    public function testAddingSuperAdmin()
    {
        $staffId = 124;
        $username = 'super_admin';
        $password = bcrypt('admin123');
        $superUser = 1; // Super user
        $isActivated = 1; // Activated by default

        $user = User::create([
            'staff_id' => $staffId,
            'username' => $username,
            'password' => $password,
            'super_user' => $superUser,
            'is_activated' => $isActivated,
        ]);


        $savedUser = User::find($user->id);


        $this->assertNotNull($savedUser);
        $this->assertEquals($staffId, $savedUser->staff_id);
        $this->assertEquals($username, $savedUser->username);

        $this->assertTrue($savedUser->isSuperUser());
    }
}
