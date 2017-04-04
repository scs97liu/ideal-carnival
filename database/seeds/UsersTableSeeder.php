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
            'email' => 'client@client.com',
            'password' => bcrypt('password'),
            'type' => 'client']
        );

        $nurse = User::create([
            'first_name' => 'Shane',
            'last_name' => 'Liu',
            'email' => 'nurse@nurse.com',
            'password' => bcrypt('password'),
            'type' => 'professional'
        ]);

        $preferences = new \App\Preferences();
        $preferences->low_target = 4.0;
        $preferences->high_target = 10.0;
        $preferences->insulin_to_carb = 10.0;
        $preferences->insulin_sensitivity = 1.5;
        $preferences->preferred_units = 'mmol/l';
        $preferences->notes = 'Overall pretty cool guy';
        $danny->preferences()->save($preferences);

        $preferences = new \App\Preferences();
        $preferences->low_target = 4.0;
        $preferences->high_target = 8.0;
        $preferences->insulin_to_carb = 10.0;
        $preferences->insulin_sensitivity = 1.5;
        $preferences->preferred_units = 'mmol/l';
        $preferences->notes = 'A nurse';
        $nurse->preferences()->save($preferences);

        $prof = new \App\MedicalProfessional();
        $prof->title = 'Nurse Practitioner';
        $nurse->professional()->save($prof);
    }
}