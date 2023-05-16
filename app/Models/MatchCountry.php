<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchCountry extends Model
{
    use HasFactory;
    protected $fillable=[
        'country_id',
        'match_id'
    ];
    public function match(){
        return $this->belongsTo(Matches::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
