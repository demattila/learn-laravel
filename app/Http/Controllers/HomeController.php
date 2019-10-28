<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        cache()->rememberForever('test_cache',function (){
            return ['lessons' => 300, 'hours' => 5000, 'series' =>100];
        });

        $test_cache= cache()->get('test_cache');

        dump($test_cache);
        return view('home');
    }

    public function  contact(){
        return view('contact');
    }

    public function  about($id=0){
        return view('about',['id' => $id]);
    }
}
