<?php

namespace Corals\UtilityRating\Tests;

//use PHPUnit\Framework\TestCase;
class RatingTest extends TestCase
{
    public function test_ratings()
    {
        $response = $this->json('utilities/ratings');
        $response->assertStatus(200);
        //$this->assertTrue(true);
    }
}
