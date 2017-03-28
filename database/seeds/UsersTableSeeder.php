<?php

use App\User;
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
        $danny = User::create([
            'first_name' => 'Daniel',
            'last_name' => 'Kivi',
            'email' => 'sugarfreedanny@gmail.com',
            'password' => bcrypt('password')]
        );

        $preferences = new \App\Preferences();
        $preferences->low_target = 4.0;
        $preferences->high_target = 10.0;
        $preferences->insulin_to_carb = 10.0;
        $preferences->insulin_sensitivity = 1.5;
        $preferences->preferred_units = 'mmol/l';
        $danny->preferences()->save($preferences);

        $shane = User::create([
            'first_name' => 'Shane',
            'last_name' => 'Liu',
            'email' => 'scliu@lakeheadu.ca',
            'password' => bcrypt('password')]
        );
    }
}