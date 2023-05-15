<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable =[
        'zone_id',
        'match_id',
        'event_id'
    ];
    public function zone(){
        return $this->belongsTo(Zone::class);
    }
    public function match(){
        return $this->belongsTo(Matches::class);
    }
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
