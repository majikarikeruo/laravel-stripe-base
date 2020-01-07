<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //ここで指定したデータのみが入るのがLaravelの$fillable
    protected $fillable = [
        'title', 'description', 'capacity','price','place','notice'
    ];
}
