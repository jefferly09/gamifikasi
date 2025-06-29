<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Difficulty;
use App\Models\Question;
use App\Models\RoomAnswer;
use Illuminate\Http\Request;

class StudentRoomController extends Controller
{
  function viewChoseDifficulty(Request $request)
  {
    $levels = [1, 2];
    $difficulties = Difficulty::all();

    $roomAnswers = RoomAnswer::where('student_id', session()->get('student_id'))
      ->where('level', session()->get('level'))
      ->get();

    return view("main2/level", [
      "title"         => "Chose Difficulty",
      "difficulties"  => $difficulties,
      "levels"        => $levels,
      "roomAnswers"   => $roomAnswers,
    ]);
  }

  function choseDifficulty(Request $request, $level, $difficultyId)
  {
    session()->put("difficult_id", $difficultyId);
    session()->put("level", $level);

    $room = RoomAnswer::create([
      'student_id'    => session()->get('student_id'),
      'difficulty_id' => $difficultyId,
      'level'         => $level,
    ]);

    session()->put("room_id", $room->id);

    return redirect()->route("room.quiz");
  }
}
