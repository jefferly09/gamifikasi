<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
  function index(Request $request)
  {
    return view("main/students", [
      "title" => "Students"
    ]);
  }
}
