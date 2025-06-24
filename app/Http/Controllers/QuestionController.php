<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
  function index(Request $request)
  {
    $questions = Question::all();
    return view("main/question", [
      "title" => "Question",
      'questions' => $questions
    ]);
  }
  function formView(Request $_request)
  {
    return view("main/form_question", [
      "title" => "Form Question"
    ]);
    //create
  }
  public function create()
  {
    return view('form_question');
  }
  public function store(Request $request)
  {
    $request->validate([
      'question' => 'required',
      'answer_a' => 'required',
      'answer_b' => 'required',
      'answer_c' => 'required',
      'right_answer' => 'required',
      'level' => 'required|integer'
    ]);

    Question::create($request->all());

    return redirect()->back()->with('success', 'Question saved successfully!');
  }
  //update
  public function edit(Request $request, $id)
  {
    $question = Question::findOrFail($id);
    return view('main.form_question_edit', compact('question'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'question' => 'required',
      'answer_a' => 'required',
      'answer_b' => 'required',
      'answer_c' => 'required',
      'right_answer' => 'required|in:a,b,c',
      'level' => 'required|integer',
    ]);

    $question = Question::findOrFail($id);
    $question->update([
      'question' => $request->question,
      'answer_a' => $request->answer_a,
      'answer_b' => $request->answer_b,
      'answer_c' => $request->answer_c,
      'right_answer' => $request->right_answer,
      'level' => $request->level,
    ]);

    return redirect('/question')->with('success', 'Soal berhasil diperbarui');
  }

  //delete
  public function destroy($id)
  {
    $question = Question::findOrFail($id);
    $question->delete();

    return redirect()->back()->with('success', 'Question deleted successfully!');
  }
}
