<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // public function organizer()
    // {
    //     return $this->belongsTo(User::class, 'event_id', 'organizer_id');
    // }
}
