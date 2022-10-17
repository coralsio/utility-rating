<?php

namespace Corals\UtilityRating;

use Carbon\Carbon;
use Corals\User\Models\Role;
use Illuminate\Support\Facades\DB;

/**
 * @package utility-rating
 */
class ScriptPermissions
{
    public static function installPermissions()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'Utility::rating.create',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::rating.view',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::rating.update',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::rating.set_status',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::rating.delete',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $member_role = Role::where('name', 'member')->first();

        if ($member_role) {
            $member_role->givePermissionTo('Utility::rating.create');
        }
    }
}
