<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalProfessional extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function connections()
    {
        return $this->belongsToMany(User::class, 'permissions', 'medical_professional_id', 'user_id');
    }

    public function scopeAttached($query)
    {
        return $query->with('user');
    }
}
