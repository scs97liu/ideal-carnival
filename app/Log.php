<?php

namespace App;

use App\Presenter\PresentableTrait;
use App\Presenter\Presenters\LogPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use PresentableTrait;

    protected $presenter = LogPresenter::class;
    protected $dates = [
        'created_at',
        'updated_at',
        'time'
    ];

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
        return $query->with('bg.notes', 'carb.notes', 'exercise.notes', 'medications.notes', 'notes')
            ->orderBy('time', 'asc');
    }

    public function scopeRange($query, $begin, $end)
    {
        return $query->where('time', '>', $begin)->where('time', '<', $end);
    }

    public function scopeToday($query)
    {
        return $this->scopeRange($query, Carbon::today(), Carbon::tomorrow());
    }

    public function scopeWeek($query)
    {
        return $this->scopeRange($query, Carbon::today()->addWeek(-1), Carbon::tomorrow());
    }

    public function scopeMonth($query)
    {
        return $this->scopeRange($query, Carbon::today()->addMonth(-1), Carbon::tomorrow());
    }
}
