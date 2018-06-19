<?php

use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userTypes')->insert([
            [
                'name' => 'super admin',
            ],[
                'name' => 'admin',
            ],[
                'name' => 'user',
            ]
        ]);
    }
}
