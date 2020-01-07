<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
        //ここで指定したデータのみが入るのがLaravelの$fillable
        protected $fillable = [
            'date', 'lesson_id', 'start_time','end_time'
        ];

    public function lesson(){
        return $this->belongsTo(('App\Lesson'));
    }
}
