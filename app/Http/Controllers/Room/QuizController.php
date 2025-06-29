<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Score;
use Illuminate\Http\Request;

class QuizController extends Controller
{
  function index(Request $request)
  {
    $questionData = Question::where("level", session()->get("level"))
      ->inRandomOrder()
      ->get();

    $difficulty = \App\Models\Difficulty::find(session()->get('difficult_id'));
    // Logic to handle quiz questions and answers
    // This is where you would retrieve questions based on the difficulty and level
    // and handle the quiz logic.

    $questions = [];
    foreach ($questionData as $data) {
      $answer = 0;
      if ($data->right_answer === "A") {
        $answer = 0;
      } elseif ($data->right_answer === "B") {
        $answer = 1;
      } elseif ($data->right_answer === "C") {
        $answer = 2;
      }
      $questions[] = [
        'id' => $data->id,
        'question' => $data->question,
        'options' => [$data->answer_a, $data->answer_b, $data->answer_c],
        "correct" => $answer,
      ];
    }

    return view('main.quiz', [
      'title' => 'Quiz',
      "questions" => $questions,
      "duration" => $difficulty->duration * 60,
      // 'questions' => $questions, // Pass the questions to the view
    ]);
  }

  function form(Request $request)
  {
    // Handle the submitted quiz answers
    // This is where you would process the answers and calculate the score.
    // You can access the submitted answers using $request->input('answers');

    $difficultyId = session()->get('difficult_id');
    $level        = session()->get('level');
    $answers      = $request->get('answers', []);
    $rightAnswers = 0;

    $difficulty   = \App\Models\Difficulty::find($difficultyId);

    $tmpAnswers   = ["A", "B", "C"];

    $allQuestions = Question::where('level', $level)->get();

    $insert = [];

    foreach ($answers as $answer) {
      $questionId = $answer['question_id'];
      $selectedAnswer = $answer['answer'];
      $question = Question::find($questionId);
      if ($question) {
        $insert[] = [
          'student_id'      => session()->get('student_id'),
          'room_answer_id'  => session()->get('room_id'),
          'question_id'     => $questionId,
          'answer'          => $tmpAnswers[$selectedAnswer],
          'created_at'      => now(),
          'updated_at'      => now(),
        ];

        // Check if the selected answer is correct
        // Assuming $question->right_answer contains the correct answer
        // and $tmpAnswers[$selectedAnswer] contains the selected answer
        if ($question->right_answer === $tmpAnswers[$selectedAnswer]) $rightAnswers++;
      }
    }

    \App\Models\Answer::insert($insert);

    $finalScore = ($rightAnswers / count($allQuestions) * 100) * $difficulty->multiply;

    Score::create([
      'student_id'  => session()->get('student_id'),
      'level'       => $level,
      'score'       => $finalScore,
    ]);

    return response()->json([
      "data" => [
        'message'       => 'Quiz submitted successfully',
        'score'         => $finalScore,
        'difficulty_id' => $difficultyId,
        'level'         => $level,
        'inserted'      => $insert,
        "input"         => [
          $request->get("answers"),
          $request->input("answers")
        ],
      ]
    ]);
  }
}
