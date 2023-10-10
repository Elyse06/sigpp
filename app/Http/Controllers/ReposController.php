<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReposController extends Controller
{
    public function index(){
        return view("repos");
    }
}
