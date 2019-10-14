<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $tasks=[
            'go shopping',
            'go to the park',
            'go to the school'
        ];

        return view('welcome',[ 'tasks' => $tasks ] );
//        return view('welcome')->withTasks($tasks);
    }

    public  function contact(){
        return view('contact');
    }

    public function about($id=0){
        return view('about')->withId($id);
    }
}
