<?php

namespace Tests\Feature;

use App\Models\ti_igniter_reviews;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_a_review()
    {
        $review = ti_igniter_reviews::create([
            'customer_id' => 1,
            'sale_id' => 1,
            'sale_type' => 'Sale',
            'author' => 'John Doe',
            'location_id' => 1,
            'quality' => 4,
            'delivery' => 5,
            'service' => 3,
            'review_text' => 'This is a test review',
            'review_status' => 1,
        ]);

        $this->assertNotNull($review);
        $this->assertEquals(1, $review->customer_id);

    }

    /** @test */
    public function test_it_can_update_a_review()
    {
        $review = ti_igniter_reviews::create([
            'customer_id' => 1,
            'sale_id' => 1,
            'sale_type' => 'Sale',
            'author' => 'John Doe',
            'location_id' => 1,
            'quality' => 4,
            'delivery' => 5,
            'service' => 3,
            'review_text' => 'This is a test review',
            'review_status' => 1,
        ]);

        $review->update(['author' => 'Jane Doe']);

        $this->assertEquals('Jane Doe', $review->author);
    }

    /** @test */
    public function test_it_can_delete_a_review()
    {
        $review = ti_igniter_reviews::create([
            'customer_id' => 1,
            'sale_id' => 1,
            'sale_type' => 'Sale',
            'author' => 'John Doe',
            'location_id' => 1,
            'quality' => 4,
            'delivery' => 5,
            'service' => 3,
            'review_text' => 'This is a test review',
            'review_status' => 1,
        ]);

        $review->delete();

        $this->assertDatabaseMissing('ti_igniter_reviews', ['review_id' => $review->review_id]);
    }
}
