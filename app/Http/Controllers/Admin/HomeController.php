<?php

namespace App\Http\Controllers\Admin;  // Adminの追加
use App\Http\Controllers\Controller;   // 追加
use Illuminate\Http\Request;


use App\Lesson;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');   // 管理者用のテンプレート
    }


    public function getLessons(){
        $lessons = Lesson::all();

        return view('admin.lessons.list', compact('lessons'));

    }


    public function getLessonForm(){

        return view('admin.lessons.new');

    }


    public function storeLessonData(Request $request){

        $lesson = new Lesson();
        $lesson->fill($request->all())->save();


        return redirect('/admin/lessons')->with('success', 'イベントの登録が完了しました');
    }


    public function getLessonEditForm($id){

        $lesson  = Lesson::find($id);
        return view('admin.lessons.edit', compact(['lesson','id']));

    }



    public function updateLessonData(Request $request, $id){

        $lesson  = Lesson::find($id);
        $lesson->fill($request->all())->save();


        return redirect('/admin/lessons')->with('success', 'イベントの登録が完了しました');
    }
}
