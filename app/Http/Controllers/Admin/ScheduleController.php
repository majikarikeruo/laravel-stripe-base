<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Lesson;


class ScheduleController extends Controller
{
    //

    public function getScheduleForm(){
        $lessons = Lesson::all();

        return view('admin.lessons.schedule', compact(['lessons']));

    }



    public function storeLessonSchedule(Request $request){

        $lesson  = Lesson::find($request->lesson_id);

        //
        $lesson->schedules()->createMany([
            $request->all()
        ]);


        return redirect('/admin/lessons/schedule')->with('success', 'イベント日程の登録が完了しました');
    }
}
