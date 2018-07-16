<?php

use Illuminate\Database\Seeder;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'name' => 'RYA',
                'symbol' => 'RYA'
            ],[
                'name' => 'RYAA',
                'symbol' => 'RYAA'
            ],[
                'name' => 'RYAD',
                'symbol' => 'RYAD'
            ],[
                'name' => 'RYD',
                'symbol' => 'RYD'
            ],[
                'name' => 'RYDA',
                'symbol' => 'RYDA'
            ],[
                'name' => 'RYDD',
                'symbol' => 'RYDD'
            ],[
                'name' => 'RYO',
                'symbol' => 'RYO'
            ],[
                'name' => 'RYOD',
                'symbol' => 'RYOD'
            ]
        ]);
    }
}
