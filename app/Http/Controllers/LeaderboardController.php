<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
  function index(Request $request)
  {
    $scores = Score::selectRaw("student_id, SUM(score) as total_score")
      ->groupBy("student_id")
      ->orderBy("total_score", "desc")
      ->with("student")
      ->get();

    return view("main/leaderboard", [
      "title" => "Leaderboard",
      "scores" => $scores
    ]);
  }
}
