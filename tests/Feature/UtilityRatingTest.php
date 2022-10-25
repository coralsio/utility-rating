<?php

namespace Tests\Feature;

use Corals\Modules\Jobs\Facades\Jobs;
use Corals\Modules\Jobs\Models\Employer;
use Corals\UtilityRating\Models\Rating;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UtilityRatingTest extends TestCase
{
    use DatabaseTransactions;

    protected $rating = [];

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->post('login', [
            'email' => 'superuser@corals.io',
            'password' => '123456',
        ]);
    }

    public function test_utility_rating_create()
    {
        if (Jobs::isActive()) {
            $employer = Employer::query()->first();
            if ($employer) {
                $response = $this->post('employers/' . $employer->hashed_id . '/rate', [
                    'review_rating' => 3,
                    'review_subject' => 'good',
                    'review_text' => 'nice', ]);

                $this->rating = Rating::query()->first();

                $response->assertStatus(200)->assertSeeText('Your review has been added successfully');
            }
        } else {
            $this->assertFalse(false);
        }
    }

    public function test_utility_rating_toggle_status()
    {
        if ($this->rating) {
            $response = $this->post('utilities/ratings/' . $this->rating->hashed_id . '/disapproved');

            $response->assertStatus(200)
                ->assertSeeText('Review status has been update successfully');
        }
        $this->assertTrue(true);
    }

    public function test_utility_rating_bulk_action()
    {
        $response = $this->post('utilities/ratings/bulk-action', [
            'action' => 'pending', ]);


        $response->assertRedirect();
    }

    public function test_utility_rating_edit()
    {
        if ($this->rating) {
            $response = $this->get('utilities/ratings/' . $this->rating->hashed_id . '/edit');

            $response->assertStatus(200)->assertViewIs('utility-rating::create_edit');
        }
        $this->assertTrue(true);
    }

    public function test_utility_rating_update()
    {
        if ($this->rating) {
            $response = $this->put('utilities/ratings/' . $this->rating->hashed_id, [
                'review_rating' => 3,
                'review_subject' => 'good',
                'review_text' => 'nice',
                'status' => 'disapproved', ]);


            $response->assertRedirect('utilities/ratings');
        }
        $this->assertTrue(true);
    }

    public function test_utility_rating_delete()
    {
        if ($this->rating) {
            $response = $this->delete('utilities/ratings/' . $this->rating->hashed_id);

            $response->assertStatus(200)->assertSeeText('Rating has been deleted successfully.');
            ;
        }
        $this->assertTrue(true);
    }
}
