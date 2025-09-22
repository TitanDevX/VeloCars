<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{

    private function processRolePermissions($roleName, $rawPerms, &$proceed = [])
    {
        $role = Role::findOrCreate($roleName);
        $proceed[] = $roleName;
        $perms = [];
        if ($roleName == "accounter") {
        }

        foreach ($rawPerms as $key => $procPerm) {

            if ($key === 'inherit') {
                $inheritRoleName = $procPerm;
                $this->processRolePermissions($inheritRoleName, config('roles')['roles'][$roleName]);
                $inheritRole = Role::findOrCreate($inheritRoleName);
                foreach ($inheritRole->permissions as $perm) {
                    $perms[] = $perm;
                }
            }

            // if (str_starts_with($procPerm, 'role.')) {
            //     $pointerRole = str_replace('role.', '', $procPerm);
            //     if (isset($rolePermReferences[$pointerRole])) {
            //         $rolePermReferences[$pointerRole][] = $roleName;
            //     } else {
            //         $rolePermReferences[$pointerRole] = [$roleName];
            //     }
            // } else {
            $perms[] = Permission::findOrCreate($procPerm);
            // }
        }
        $role->syncPermissions($perms);
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $config = config('roles');
        $rolePermReferences = [];
        $proceed = [];
        foreach ($config['roles'] as $roleName => $rawPerms) {

            if (array_search($roleName, $proceed)) {
                continue;
            }
            $this->processRolePermissions($roleName, $rawPerms, $proceed);

        }



        // $done = [];
        // $shouldRunAgain = true;
        // while ($shouldRunAgain === true) {
        //     $e = false;
        //     foreach ($rolePermReferences as $referencedRole => $referencerRoles) {

        //         if (array_search($referencedRole, $done)) {
        //             continue;
        //         }
        //         foreach ($rolePermReferences as $referencedRole2 => $referencerRoles2) {
        //             if (array_search($referencedRole, $referencerRoles2)) {
        //                 $e = true;
        //                 continue 2;
        //             }
        //         }
        //         $done[] = $referencedRole;
        //         $refRoleObj = Role::findOrCreate($referencedRole);

        //         foreach ($referencerRoles as $roleName) {
        //             $role = Role::findOrCreate($roleName);
        //             $perms = [];
        //             foreach ($refRoleObj->permissions as $perm) {
        //                 $perms[] = $perm;
        //             }
        //             $role->givePermissionTo($perms);
        //         }
        //     }
        //     $shouldRunAgain = $e;
        // }
        // $ToWrite = [];
        // Role::all()->each(function ($role) use (&$ToWrite) {
        //     foreach ($role->permissions as $perm) {
        //         $ToWrite[] = "$role->name has $perm->name";
        //     }

        // });

        // dd($ToWrite);


    }


}
