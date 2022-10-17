<?php

namespace Corals\UtilityRating\Facades;

use Illuminate\Support\Facades\Facade;

class RatingManager extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return \Corals\UtilityRating\Classes\RatingManager::class;
    }
}
