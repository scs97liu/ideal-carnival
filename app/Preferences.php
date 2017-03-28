<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    public function setHighTargetAttribute($value)
    {
        $preferredUnits = Auth::user()->getSetting('preferred_units', 'mmol/l');
        if($preferredUnits === 'mmol/l')
        {
            $this->attributes['high_target'] = $value;
            return;
        } else {
            $this->attributes['high_target'] = round($value / 18, 1);
        }
    }

    public function setLowTargetAttribute($value)
    {
        $preferredUnits = Auth::user()->getSetting('preferred_units', 'mmol/l');
        if($preferredUnits === 'mmol/l')
        {
            $this->attributes['low_target'] = $value;
            return;
        } else {
            $this->attributes['low_target'] = round($value / 18, 1);
        }
    }
}
