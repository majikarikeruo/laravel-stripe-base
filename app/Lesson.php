<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //ここで指定したデータのみが入るのがLaravelの$fillable
    protected $fillable = [
        'title', 'description', 'capacity','price','place','notice'
    ];


    public function schedules(){
        return $this->hasMany(('App\Schedule'));
    }

    public function place(){
        return $this->belongsTo(('App\Place'));
    }
}
