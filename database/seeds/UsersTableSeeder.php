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

        $shane = User::create([
            'first_name' => 'Shane',
            'last_name' => 'Liu',
            'email' => 'scliu@lakeheadu.ca',
            'password' => bcrypt('password')]
        );
    }
}