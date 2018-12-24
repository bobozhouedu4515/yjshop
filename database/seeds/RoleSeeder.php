<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::firstOrNew (['name'=>'superAdmin'])->fill(['title'=>'超级管理员','guard_name'=>'admin'])
        ->save();
    }
}
