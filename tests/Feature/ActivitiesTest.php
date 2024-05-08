<?php

namespace Tests\Feature;

use App\Models\Ti_activities;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivitiesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_activity_creation()
    {
        $data = [
            'user_id' => 1,
            'log_name' => 'test_log',
            'properties' => ['key' => 'value'],
            'subject_id' => 1,
            'subject_type' => 'TestSubject',
            'causer_id' => 2,
            'causer_type' => 'TestCauser',
            'type' => 'test_type',
            'user_type' => 'TestUser',
        ];

        $activity = Ti_activities::create($data);

        $this->assertInstanceOf(Ti_activities::class, $activity);
    }

    public function test_activity_update()
    {
        $activity = Ti_activities::create([
            'user_id' => 1,
            'log_name' => 'test_log',
            'properties' => ['key' => 'value'],
            'subject_id' => 1,
            'subject_type' => 'TestSubject',
            'causer_id' => 2,
            'causer_type' => 'TestCauser',
            'type' => 'test_type',
            'user_type' => 'TestUser',
        ]);

        $updateData = [
            'log_name' => 'updated_log',
            'type' => 'updated_type',
        ];

        $activity->update($updateData);

        $updatedActivity = Ti_activities::find($activity->id);

        $this->assertEquals($updateData['log_name'], $updatedActivity->log_name);
        $this->assertEquals($updateData['type'], $updatedActivity->type);
    }

    public function test_activity_deletion()
    {
        $activity = Ti_activities::create([
            'user_id' => 1,
            'log_name' => 'test_log',
            'properties' => ['key' => 'value'],
            'subject_id' => 1,
            'subject_type' => 'TestSubject',
            'causer_id' => 2,
            'causer_type' => 'TestCauser',
            'type' => 'test_type',
            'user_type' => 'TestUser',
        ]);

        $activity->delete();

        $deletedActivity = Ti_activities::find($activity->id);

        $this->assertNull($deletedActivity);
    }

    public function test_activity_type_update()
    {
        $activity = Ti_activities::create([
            'user_id' => 1,
            'log_name' => 'test_log',
            'properties' => ['key' => 'value'],
            'subject_id' => 1,
            'subject_type' => 'TestSubject',
            'causer_id' => 2,
            'causer_type' => 'TestCauser',
            'type' => 'test_type',
            'user_type' => 'TestUser',
        ]);

        $activity->update(['type' => 'new_type']);

        $updatedActivity = Ti_activities::find($activity->id);

        $this->assertEquals('new_type', $updatedActivity->type);
    }

}
