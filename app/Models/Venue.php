<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'location'
    ];
    public function zone(){
        return $this->hasMany(Zone::class);
    }
    public function match(){
        return $this->hasMany(Matches::class);
    }
    
}
