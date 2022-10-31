<?php

namespace Corals\Modules\Utility\Traits\Rating;

trait RatingCommon
{
    /** @var \Corals\Modules\Utility\RatingService\Rating */
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
