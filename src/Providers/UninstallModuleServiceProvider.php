<?php

namespace Corals\Modules\Utility\Rating\Providers;

use Corals\Modules\Utility\Rating\database\seeds\UtilityRatingDatabaseSeeder;
use Corals\Foundation\Providers\BaseUninstallModuleServiceProvider;
use Corals\Modules\Utility\Rating\database\migrations\CreateRatingTable;

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
