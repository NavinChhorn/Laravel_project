<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable =[
        'zone_id',
        'match_country_id',
        'booking'
    ];
    public function zone(){
        return $this->belongsTo(Zone::class);
    }
    public function match_country(){
        return $this->belongsTo(MatchCountry::class);
    }
    
}
