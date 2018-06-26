<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index;

        for($index = 0; $index < 2; $index++){
            DB::table('users')->insert([
                'name' => "sadmin$index",
                'email' => "sadmin$index@aol.com",
                'type_id' => '1',
                'password' => bcrypt('password')
            ]);
        }
        for($index = 0; $index < 3; $index++){
            DB::table('users')->insert([
                'name' => "admin$index",
                'email' => "admin$index@aol.com",
                'type_id' => '2',
                'password' => bcrypt('password')
            ]);
        }
        for($index = 0; $index < 10; $index++){
            DB::table('users')->insert([
                'name' => "user$index",
                'email' => "user$index@aol.com",
                'type_id' => '3',
                'password' => bcrypt('password')
            ]);
        }
    }
}
