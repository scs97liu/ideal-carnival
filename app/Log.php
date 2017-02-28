<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function bg()
    {
        return $this->hasOne(BloodSugar::class);
    }

    public function carb()
    {
        return $this->hasOne(Carb::class);
    }

    public function exercise()
    {
        return $this->hasOne(Exercise::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }

    public function scopeAttached($query)
    {
        return $query->with('bg.notes', 'carb.notes', 'exercise.notes', 'medications.notes', 'notes');
    }
}
