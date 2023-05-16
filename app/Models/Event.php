<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description'
    ];
    public function match(){
        return $this->hasMany(Matches::class);
    }
   
}
