<?php

namespace Corals\UtilityRating\database\seeds;

use Corals\User\Communication\Models\NotificationTemplate;
use Corals\User\Models\Permission;
use Illuminate\Database\Seeder;

class UtilityRatingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UtilityRatingPermissionsDatabaseSeeder::class);
        $this->call(UtilityRatingNotificationTemplatesSeeder::class);
    }

    public function rollback()
    {
        Permission::where('name', 'like', 'Utility::rating%')->delete();
        Permission::where('name', 'Administrations::admin.utility_rating')->delete();

        NotificationTemplate::where('name', 'like', 'notifications.utility_rating%')->delete();
    }
}
