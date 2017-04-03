<?php

namespace App;

use App\Presenter\PresentableTrait;
use App\Presenter\Presenters\UserPresenter;
use App\Scopes\SettingsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, PresentableTrait, SettingsTrait;

    protected $presenter = UserPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function preferences()
    {
        return $this->hasOne(Preferences::class);
    }

    public function professional()
    {
        return $this->hasOne(MedicalProfessional::class);
    }

    public function connections()
    {
        return $this->belongsToMany(MedicalProfessional::class, 'permissions', 'user_id', 'medical_professional_id');
    }
}
