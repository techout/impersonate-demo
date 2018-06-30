<?php

use Illuminate\Database\Seeder;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            [
                'name' => 'Accounting'
            ],[
                'name' => 'Finance'
            ],[
                'name' => 'Information Technology'
            ],[
                'name' => 'Human Resource'
            ],[
                'name' => 'Security'
            ]
        ]);
    }
}
