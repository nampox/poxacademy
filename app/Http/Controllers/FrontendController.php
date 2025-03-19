<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class FrontendController extends Controller{
    public function index(){
        return view('frontend.index');
    }
}
