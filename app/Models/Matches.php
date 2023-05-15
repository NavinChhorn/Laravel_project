<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $fillable =[
        'date',
        'time',
        'venue_id',
        'event_id'
    ];
    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function venue(){
        return $this->belongsTo(Venue::class);
    }
    public function matchCountry(){
        return $this->hasMany(MatchCountry::class);
    }
}
