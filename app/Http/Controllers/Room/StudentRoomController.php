<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Difficulty;
use App\Models\Question;
use Illuminate\Http\Request;

class StudentRoomController extends Controller
{
  function index(Request $request)
  {
    $questions = Question::where("level", session()->get("level"))
      ->inRandomOrder()
      ->get();


    return view("main/room/student", [
      "title" => "Student Room",
      "questions" => $questions
    ]);
  }

  function viewChoseDifficulty(Request $request)
  {
    $difficulties = Difficulty::all();
    return view("main/room/chose-difficulty", [
      "title" => "Chose Difficulty",
      "difficulties" => $difficulties
    ]);
  }

  function choseDifficulty(Request $request)
  {
    session()->put("difficult_id", $request->get("difficult_id"));

    return redirect()->route("room.student.index");
  }

  function form(Request $request)
  {

  }
}
