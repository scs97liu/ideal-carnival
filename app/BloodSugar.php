<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BloodSugar extends Model
{
    public function log()
    {
        return $this->belongsTo(Log::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }

    public function getBgAttribute($value)
    {
        $preferredUnits = Auth::user()->getSetting('preferred_units', 'mmol/l');
        if($preferredUnits === 'mmol/l') return $value;
        return $value * 18;
    }

    public function setBgAttribute($value)
    {
        if(Auth::check()){
            $preferredUnits = Auth::user()->getSetting('preferred_units', 'mmol/l');
            if ($preferredUnits === 'mmol/l') {
                $this->attributes['bg'] = $value;
                return;
            } else {
                $this->attributes['bg'] = round($value / 18, 1);
            }
        }
    }
}
