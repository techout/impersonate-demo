<?php

use Illuminate\Database\Seeder;

class CardLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index;

        DB::table('cardlinks')->insert([
            [
                'card_id' => '1',
                'name' => "Acct",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '1',
                'name' => "Books",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '2',
                'name' => "Maths",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '2',
                'name' => "Counting",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '2',
                'name' => "Money Talks",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '3',
                'name' => "Computers",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '4',
                'name' => "Humans and How to Look Like One",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '4',
                'name' => "Hating (and Loving) Humans",
                'url' => 'http://www.google.com'
            ],[
                'card_id' => '5',
                'name' => "Securing Things",
                'url' => 'http://www.google.com'
            ]
        ]);
    }
}
