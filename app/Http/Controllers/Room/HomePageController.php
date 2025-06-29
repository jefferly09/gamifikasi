<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
  function index()
  {
    return view('main2/homepage', [
      'title' => 'Home Page'
    ]);
  }

  function profile()
  {
    $student = Student::find(session()->get('student_id'));
    return view('main2/profil', [
      'title' => 'Profile',
      'student' => $student
    ]);
  }

  function leaderboard()
  {
    $scores = Score::selectRaw("student_id, SUM(score) as total_score")
      ->groupBy("student_id")
      ->orderBy("total_score", "desc")
      ->with("student")
      ->get();
    return view('main2/leaderboard_student', [
      'title' => 'Leaderboard',
      'scores' => $scores
    ]);
  }
}
