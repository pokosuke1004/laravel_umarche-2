<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentTestController extends Controller
{
    public function component_test1(){
        
        return view('tests.test1');
    }
    public function component_test2(){
        return view('tests.test2');
    }
}
