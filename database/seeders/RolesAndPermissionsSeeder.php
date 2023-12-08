<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $Permissions = [
            'Operator - Create',
            'Operator - Read',
            'Operator - Update',
            'Operator - Delete',
            'Study Program - Create',
            'Study Program - Read',
            'Study Program - Update',
            'Study Program - Delete',
            'Grade - Create',
            'Grade - Read',
            'Grade - Update',
            'Grade - Delete',
            'Voter - Create',
            'Voter - Read',
            'Voter - Update',
            'Voter - Delete',
            'Voter - Import',
            'Witness - Create',
            'Witness - Read',
            'Witness - Update',
            'Witness - Delete',
            'Witness - Import',
            'Candidate - Create',
            'Candidate - Read',
            'Candidate - Update',
            'Candidate - Delete',
            'Election Status - Already',
            'Election Status - Not Yet',
        ];

        foreach ($Permissions as $Permission) {
            Permission::create(['name' => $Permission]);
        }
        
        $Administrator = Role::create(['name' => 'Administrator']);
        $Administrator->givePermissionTo('Operator - Create');
        $Administrator->givePermissionTo('Operator - Read');
        $Administrator->givePermissionTo('Operator - Update');
        $Administrator->givePermissionTo('Operator - Delete');
        $Administrator->givePermissionTo('Study Program - Create');
        $Administrator->givePermissionTo('Study Program - Read');
        $Administrator->givePermissionTo('Study Program - Update');
        $Administrator->givePermissionTo('Study Program - Delete');
        $Administrator->givePermissionTo('Grade - Create');
        $Administrator->givePermissionTo('Grade - Read');
        $Administrator->givePermissionTo('Grade - Update');
        $Administrator->givePermissionTo('Grade - Delete');
        $Administrator->givePermissionTo('Voter - Create');
        $Administrator->givePermissionTo('Voter - Read');
        $Administrator->givePermissionTo('Voter - Update');
        $Administrator->givePermissionTo('Voter - Delete');
        $Administrator->givePermissionTo('Voter - Import');
        $Administrator->givePermissionTo('Witness - Create');
        $Administrator->givePermissionTo('Witness - Read');
        $Administrator->givePermissionTo('Witness - Update');
        $Administrator->givePermissionTo('Witness - Delete');
        $Administrator->givePermissionTo('Witness - Import');
        $Administrator->givePermissionTo('Candidate - Create');
        $Administrator->givePermissionTo('Candidate - Read');
        $Administrator->givePermissionTo('Candidate - Update');
        $Administrator->givePermissionTo('Candidate - Delete');
        $Administrator->givePermissionTo('Election Status - Already');
        $Administrator->givePermissionTo('Election Status - Not Yet');

        $Operator = Role::create(['name' => 'Operator']);
        $Operator->givePermissionTo('Study Program - Read');
        $Operator->givePermissionTo('Grade - Read');
        $Operator->givePermissionTo('Voter - Create');
        $Operator->givePermissionTo('Voter - Read');
        $Operator->givePermissionTo('Voter - Update');
        $Operator->givePermissionTo('Voter - Delete');
        $Operator->givePermissionTo('Voter - Import');
        $Operator->givePermissionTo('Witness - Create');
        $Operator->givePermissionTo('Witness - Read');
        $Operator->givePermissionTo('Witness - Update');
        $Operator->givePermissionTo('Witness - Delete');
        $Operator->givePermissionTo('Witness - Import');
        $Operator->givePermissionTo('Candidate - Create');
        $Operator->givePermissionTo('Candidate - Read');
        $Operator->givePermissionTo('Candidate - Update');
        $Operator->givePermissionTo('Candidate - Delete');
        $Operator->givePermissionTo('Election Status - Already');
        $Operator->givePermissionTo('Election Status - Not Yet');

        $Witness = Role::create(['name' => 'Witness']);
        $Witness->givePermissionTo('Election Status - Already');
        $Witness->givePermissionTo('Election Status - Not Yet');

        $Voter = Role::create(['name' => 'Voter']);
    }
}
