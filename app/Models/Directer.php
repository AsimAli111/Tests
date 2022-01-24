<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Directer extends Model
{
    use HasFactory;
    protected $fillable=['writer','age','book_id'];
    public function book(){
        return $this->hasMany('App\Models\Book');
    }
}
