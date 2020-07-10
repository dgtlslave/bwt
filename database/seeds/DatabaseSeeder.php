<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Country;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class, 10)->create();
        factory(Country::class, 10)->create();
        factory(Company::class, 10)->create();

        foreach(Company::all() as $item) {
            $user = User::inRandomOrder()->take(rand(1,10))->pluck('id');
            $item->users()->attach($user);
        }

        foreach(Company::all() as $item) {
            $country = Country::inRandomOrder()->take(rand(1,10))->pluck('id');
            $item->countries();
        }
    }
}
