<?php

namespace App\Http\Controllers;

use App\Models\Student;

abstract class Controller
{
  function student()
  {
    return Student::findOrFail(session()->get("student_id"));
  }
}
