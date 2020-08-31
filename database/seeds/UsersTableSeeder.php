<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $user =\App\User::create([
            'id' => 1,
            'name' => 'Abeer',
            'email' => 'abeeralrashediii@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456a'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user->attachRole('super_admin');
        $user2 =\App\User::create([
              'id' => 2,
              'name' => 'lama',
              'email' => 'lama@gmail.com',
              'email_verified_at' => now(),
              'password' => Hash::make('123456a'),
              'created_at' => now(),
              'updated_at' => now()
          ]);

          $user2->attachRole('super_admin');
          $user3 =\App\User::create([
                'id' => 3,
                'name' => 'sahar',
                'email' => 'sahar@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456a'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $user3->attachRole('super_admin');
            $user4 =\App\User::create([
                  'id' => 4,
                  'name' => 'shroq',
                  'email' => 'shroq@gmail.com',
                  'email_verified_at' => now(),
                  'password' => Hash::make('123456a'),
                  'created_at' => now(),
                  'updated_at' => now()
              ]);

              $user4->attachRole('super_admin');
              $user5=\App\User::create([
                    'id' => 5,
                    'name' => 'ghayda',
                    'email' => 'ghayda@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123456a'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                $user5->attachRole('super_admin');

                /*sup admin */
        $use =\App\User::create([
              'id' => 6,
              'name' => 'So',
              'email' => 'sar2a@gmail.com',
              'email_verified_at' => now(),
              'password' => Hash::make('123456a'),
              'created_at' => now(),
              'updated_at' => now()
          ]);

          $use->attachRole('sup_admin');
    }
}
