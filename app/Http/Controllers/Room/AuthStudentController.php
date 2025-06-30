<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AuthStudentController extends Controller
{
  function index() {
    return view('main2/form_student');
  }

  function form(Request $request)
  {
    $validate = $request->validate([
      "name"              => "required|string|max:255",
      "attendance_number" => "required|string|max:255",
      "classroom"         => "required|string|max:255",
      "sex"               => "required|in:M,F"
    ]);

    $student = Student::where("attendance_number", $request->attendance_number)->where("classroom", $request->classroom)->first();
    if (!$student) {
      $student = Student::create($request->all());
    }

    session()->put("student_id", $student->id);
    session()->put("level", 1);

    return redirect()->route('room.homepage')->with([
      "message" => "Welcome to the room, " . $student->name . "!",
      "alert-type" => "success"
    ]);
  }
}
