<?php

namespace Corals\Modules\Utility\Providers;

use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;
use Corals\Modules\Utility\database\migrations\CreateRatingTable;
use Corals\Modules\Utility\database\seeds\UtilityRatingDatabaseSeeder;

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
