<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'service_id','thumbnail', 'slug', 'description', 'image'];

    public function getCreatedAtAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
