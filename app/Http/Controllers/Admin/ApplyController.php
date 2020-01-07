<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Schedule;

class ApplyController extends Controller
{
    //

    public function getApplyList(){

        $schedules = Schedule::all();

        return view('admin.apply.list', compact(['schedules']));
    }

}
