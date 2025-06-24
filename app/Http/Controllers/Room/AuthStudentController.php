<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AuthStudentController extends Controller
{
  function index() {}

  function form(Request $request)
  {
    $validate = $request->validate([
      "name" => "required|string|max:255",
      "attendance_number" => "required|string|max:255|unique:students,attendance_number",
      "classroom" => "required|string|max:255",
      "sex" => "required|in:M,F"
    ]);

    $student = Student::create($request->all());

    session()->put("student_id", $student->id);
    session()->put("level", 1);

    return redirect()->route('students.index');
  }
}
