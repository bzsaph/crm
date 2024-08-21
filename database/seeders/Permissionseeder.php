<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $createUser = new Permission();
        $createUser->name = 'user-create';
        $createUser->guard_name = 'web';
        $createUser->save();

        $updateUser = new Permission();
        $updateUser->name = 'user-update';
        $updateUser->guard_name = 'web';
        $updateUser->save();

        $deleteUser = new Permission();
        $deleteUser->name = 'user-delete';
        $deleteUser->guard_name = 'web';
        $deleteUser->save();


         /**
         * Client Permissions
         */

        $createClient = new Permission();
        $createClient->name = 'project-create';
        $createClient->guard_name = 'web';
        $createClient->save();

        $updateClient = new Permission();
        $updateClient->name = 'project-update';
        $updateClient->guard_name = 'web';
        $updateClient->save();

        $deleteClient = new Permission();
        $deleteClient->name = 'project-delete';
        $deleteClient->guard_name = 'web';
        $deleteClient->save();

         /**
         * Tasks Permissions
         */

        $createTask = new Permission();
        $createTask->name = 'comment-project-create';
        $createTask->guard_name = 'web';
        $createTask->save();

        $updateTask = new Permission();
        $updateTask->name = 'comment-project-update';
        $updateTask->guard_name = 'web';
        $updateTask->save();

        $updateTask = new Permission();
        $updateTask->name = 'comment-project-delete';
        $updateTask->guard_name = 'web';
        $updateTask->save();

        $updateTask = new Permission();
        $updateTask->name = 'comment-project-dashboard';
        $updateTask->guard_name = 'web';
        $updateTask->save();


        $updateTask = new Permission();
        $updateTask->name = 'privillage-create';
        $updateTask->guard_name = 'web';
        $updateTask->save();

        $updateTask = new Permission();
        $updateTask->name = 'privillage-update';
        $updateTask->guard_name = 'web';
        $updateTask->save();
        $updateTask = new Permission();
        $updateTask->name = 'privillage-delete';
        $updateTask->guard_name = 'web';
        $updateTask->save();
        $updateTask = new Permission();
        $updateTask->name = 'privillage-view';
        $updateTask->guard_name = 'web';
        $updateTask->save();
    }
}
