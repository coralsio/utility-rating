<?php

namespace Corals\UtilityRating\Providers;

use Corals\Foundation\Providers\BaseUninstallModuleServiceProvider;
use Corals\UtilityRating\database\migrations\CreateRatingTable;
use Corals\UtilityRating\database\seeds\UtilityRatingDatabaseSeeder;

class UninstallModuleServiceProvider extends BaseUninstallModuleServiceProvider
{
    protected $migrations = [
        CreateRatingTable::class,
    ];

    protected function providerBooted()
    {
        $this->dropSchema();

        $utilityRatingDatabaseSeeder = new UtilityRatingDatabaseSeeder();

        $utilityRatingDatabaseSeeder->rollback();
    }
}
