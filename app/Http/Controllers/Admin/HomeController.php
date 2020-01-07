<?php

namespace App\Http\Controllers\Admin;  // Adminの追加
use App\Http\Controllers\Controller;   // 追加
use Illuminate\Http\Request;


use App\Lesson;
use App\Place;

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
        $places = Place::all();

        return view('admin.lessons.new', compact('places'));

    }

    public function getLessonCommonInfo(){

        return view('admin.lessons.info');

    }
    public function storeLessonData(Request $request){

        $lesson = new Lesson();
        $lesson->fill($request->all())->save();


        return redirect('/admin/lessons')->with('success', 'イベントの登録が完了しました');
    }


    public function getLessonEditForm($id){

        $lesson  = Lesson::find($id);
        $places = Place::all();

        return view('admin.lessons.edit', compact(['lesson','id', 'places']));

    }

    public function showLessonInfo($id){


        return view('admin.lessons.detail', compact('id'));

    }


    public function updateLessonData(Request $request, $id){

        $lesson  = Lesson::find($id);
        $lesson->fill($request->all())->save();


        return redirect('/admin/lessons')->with('success', 'イベントの登録が完了しました');
    }


}
