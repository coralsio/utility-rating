<?php

namespace Corals\UtilityRating\Providers;

use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;
use Corals\UtilityRating\database\migrations\CreateRatingTable;
use Corals\UtilityRating\database\seeds\UtilityRatingDatabaseSeeder;

class InstallModuleServiceProvider extends BaseInstallModuleServiceProvider
{
    protected $migrations = [
        CreateRatingTable::class,
    ];

    protected function providerBooted()
    {
        $this->createSchema();

        $utilityRatingDatabaseSeeder = new UtilityRatingDatabaseSeeder();

        $utilityRatingDatabaseSeeder->run();
    }
}
