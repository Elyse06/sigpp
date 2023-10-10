<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function index(){
        return view("conge");
    }
}
