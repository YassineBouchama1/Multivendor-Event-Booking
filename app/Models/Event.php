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
        'city',
        'description',
        'location_latitude',
        'location_longitude',
        'category_id',
        'category_id',
        'organizer_id',
        'date',
        'places',
        'status',
        'reservation_method'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
