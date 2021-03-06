<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    public function log()
    {
        return $this->belongsTo(Log::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
