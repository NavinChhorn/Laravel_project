<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'venue_id'
    ];
    public function venue(){
        return $this->belongsTo(Venue::class);
    }
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
