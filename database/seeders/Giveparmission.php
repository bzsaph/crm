<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\User;
use Spatie\Permission\Models\Permission;

class Giveparmission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::findById(1);
        $role->givePermissionTo(Permission::all());
        $user=User::find('1');
        $user->assignRole($role->name);



    }

}
