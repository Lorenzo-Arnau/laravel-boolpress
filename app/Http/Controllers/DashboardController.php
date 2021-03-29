<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){
    $dates= Author::all();
    return view('index',compact('dates'));
   }
}
