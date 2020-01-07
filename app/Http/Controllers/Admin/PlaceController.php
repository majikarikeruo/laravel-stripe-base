<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

 use App\Place;

class PlaceController extends Controller
{
    //


    public function getPlaceList(){

        $places = Place::all();

        return view('admin.place.list', compact('places'));
    }
}
