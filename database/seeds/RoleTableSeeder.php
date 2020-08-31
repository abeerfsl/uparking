<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $superAdmin = \App\Role::create([
      'name'=>'super_admin',
      'display_name'=>'super admin',
      'description' => 'can all used '

    ]);

     $sup_Admin = \App\Role::create([
       'name'=>'sup_admin',
       'display_name'=>'sup admin',
       'description' => 'can not all '
     ]);

     $user = \App\Role::create([
       'name'=>'user',
       'display_name'=>'user',
       'description' => 'can do specific tasks'
     ]);
    }


}
