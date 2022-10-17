<?php

namespace Corals\UtilityRating\Observers;

use Corals\UtilityRating\Models\Rating;

class RatingObserver
{

    /**
     * @param Rating $rating
     */
    public function created(Rating $rating)
    {
    }
}
