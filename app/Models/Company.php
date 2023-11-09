<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'user_id', 'short_description', 'location', 'description', 'photo', 'facebook', 'twitter', 'phone', 'keywords'];

//    public function user()
//    {
//        return $this->belongsTo('App\Models\User');
//    }

}
