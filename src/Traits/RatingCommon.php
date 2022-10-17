<?php

namespace Corals\UtilityRating\Traits;

trait RatingCommon
{
    /** @var \Corals\UtilityRating\RatingService */
    protected $ratingService;
    protected $rateableClass = null;
    protected $redirectUrl = null;
    protected $successMessage = 'utility-rating::messages.rating.success.add';
    protected $successMessageWithPending = 'utility-rating::messages.rating.success.add_with_pending';

    protected function setCommonVariables()
    {
        $this->rateableClass = null;
        $this->redirectUrl = null;
    }
}
