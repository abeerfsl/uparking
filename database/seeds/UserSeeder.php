<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $user =\App\Users::create([
            'username' => 'abeer',
            'password' => Hash::make('123456a'),
            // 'first_name' => 'Abeer',
            // 'last_name' => 'Abeer',
            'phone_number'=>'05362489',
            'email' => 'abeer@gmail.com',
            'otp'=>'053',
            'verified'=>'0',
            'gender'=>'male',
            'code'=>'053k',
            'city'=>'mecca',
            'country'=>'saudi arabia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user->attachRole('user');

    }
}
