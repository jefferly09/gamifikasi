<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
  function index(Request $request)
  {
    $scores = Score::orderBy("score", "desc")
      ->with("student")
      ->paginate(10);

    return view("main/leaderboard", [
      "title" => "Leaderboard",
      "scores" => $scores
    ]);
  }
}
