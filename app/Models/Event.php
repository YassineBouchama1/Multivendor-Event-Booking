<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'cover',
        'price',
        'location',
        'description',
        'location_latitude',
        'location_longitude',
        'category_id',
        'category_id',
        'organizer_id',
        'start_date',
        'end_date',
        'places',
        'status',
        'reservation_method'

    ];


    //this is organizer
    public function user()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
