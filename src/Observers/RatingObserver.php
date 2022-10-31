<?php

namespace Corals\Modules\Utility\Rating\Observers;

use Corals\Modules\Utility\Rating\Models\Rating;

class RatingObserver
{
    /**
     * @param Rating $rating
     */
    public function created(Rating $rating)
    {
    }
}
