<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsFormController extends Controller
{

    public function index()
    {
        return view('main2/form_student');
    }
}
