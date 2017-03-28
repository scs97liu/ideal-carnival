<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setHighTargetAttribute($value)
    {
        $preferredUnits = $this->preferred_units;
        if($preferredUnits === 'mg/dl')
        {
            $this->attributes['high_target'] = round($value / 18, 1);
        } else {
            $this->attributes['high_target'] = $value;
        }
    }

    public function setLowTargetAttribute($value)
    {
        $preferredUnits = $this->preferred_units;
        if($preferredUnits === 'mg/dl')
        {
            $this->attributes['low_target'] = round($value / 18, 1);
        } else {
            $this->attributes['low_target'] = $value;
        }
    }
}
