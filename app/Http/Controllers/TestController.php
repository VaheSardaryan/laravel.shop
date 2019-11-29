<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test1() {
        $my_var = 15;
        return view('test', compact('my_var'));
    }
}
