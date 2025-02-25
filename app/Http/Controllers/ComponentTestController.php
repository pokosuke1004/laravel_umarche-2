<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentTestController extends Controller
{
    public function component_test1(){
        $message="controllerからのメッセージです";
        return view('tests.test1',compact('message'));
    }
    public function component_test2(){
        $message="コントローラーの違うメソッドからメッセージ送ります";
        return view('tests.test2',compact('message'));
    }
}
