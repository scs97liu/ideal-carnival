<?php

use App\BloodSugar;
use App\Carb;
use App\Log;
use App\Medication;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    public function run()
    {

        $json = file_get_contents(resource_path('demo-data.json'));
        $parsed = json_decode($json);

        foreach($parsed as $entry)
        {
            if(array_key_exists('bgInput', $entry))
            {
                $mainLog = new Log();
                $datetime = Carbon::createFromFormat('Y-m-d\TH:i:s', substr($entry->time, 0, 19));
                $datetime->addYears(2)->addMonth(1)->addDays(20);
                $mainLog->time = $datetime;
                $mainLog->user_id = 1;
                $mainLog->save();

                $bg = new BloodSugar();
                $bg->bg = round($entry->bgInput, 1);
                $mainLog->bg()->save($bg);

                $carb = new Carb();
                $carb->carbs = $entry->carbInput;
                $mainLog->carb()->save($carb);

                $insulin = new Medication();
                $insulin->amount = $entry->recommended->net;
                $insulin->type = 'Novorapid';
                $mainLog->medications()->save($insulin);

            }
        }
    }
}