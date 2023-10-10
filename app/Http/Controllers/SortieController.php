<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function index(){
        return view("sortie");
    }
}
