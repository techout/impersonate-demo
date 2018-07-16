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
        $branch_id = "0";
        // Super Admins
        for($index = 0; $index < 2; $index++){
            DB::table('users')->insert([
                'branch_id' => '8',
                'name' => "sadmin$index",
                'email' => "sadmin$index@aol.com",
                'type_id' => '1',
                'password' => bcrypt('password')
            ]);
        }

        // Admins
        for($index = 0; $index < 3; $index++){
            DB::table('users')->insert([
                'branch_id' => '8',
                'name' => "admin$index",
                'email' => "admin$index@aol.com",
                'type_id' => '2',
                'password' => bcrypt('password')
            ]);
        }

        // Users
        for($index = 0; $index < 15; $index++){
            if($index < 2)
                $branch_id = '1';
            else if($index < 5)
                $branch_id = '2';
            else if($index < 7)
                $branch_id = '3';
            else if($index < 9)
                $branch_id = '4';
            else if($index < 11)
                $branch_id = '5';
            else if($index < 13)
                $branch_id = '6';
            else
                $branch_id = '7';

            DB::table('users')->insert([
                'branch_id' => $branch_id,
                'name' => "user$index",
                'email' => "user$index@aol.com",
                'type_id' => '3',
                'password' => bcrypt('password')
            ]);
            DB::table('users')->insert([
                'branch_id' => '6',
                'name' => "warmachine68",
                'email' => "warmachine68@hotmail.com",
                'type_id' => '3',
                'password' => bcrypt('WARMACHINEROX')
            ]);
        }
    }
}
