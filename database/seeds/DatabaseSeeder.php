<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchesSeeder::class);
        $this->call(CardLinksSeeder::class);
        $this->call(CardsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserTypesSeeder::class);
    }
}
