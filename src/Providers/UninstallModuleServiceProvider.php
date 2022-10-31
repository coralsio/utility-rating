<?php

namespace Corals\Modules\Utility\Providers;

use Corals\Foundation\Providers\BaseUninstallModuleServiceProvider;
use Corals\Modules\Utility\database\migrations\CreateRatingTable;
use CCorals\Modules\Utility\database\seeds\UtilityRatingDatabaseSeeder;

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
