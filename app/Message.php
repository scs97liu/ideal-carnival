<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'to_user');
    }

    public function log()
    {
        return $this->hasOne(Log::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('viewed', 0)->with('sender');
    }

}