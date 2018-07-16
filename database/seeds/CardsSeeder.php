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
                'name' => 'Accounting',
                'bg' => randomHexColor(),
                'font' => '#000000'
            ],[
                'name' => 'Finance',
                'bg' => randomHexColor(),
                'font' => '#000000'
            ],[
                'name' => 'Information Technology',
                'bg' => randomHexColor(),
                'font' => '#000000'
            ],[
                'name' => 'Human Resource',
                'bg' => randomHexColor(),
                'font' => '#000000'
            ],[
                'name' => 'Security',
                'bg' => randomHexColor(),
                'font' => '#000000'
            ]
        ]);
    }
}
