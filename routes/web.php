<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Room\AuthStudentController;
use App\Http\Controllers\Room\StudentRoomController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\RoomMiddleware;

Route::get('/', function () {
  return view('welcome');
});
//login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//main
Route::get("/leaderboard", [LeaderboardController::class, "index"]);
Route::get("/question", [QuestionController::class, "index"]);
Route::get("/form_question", [QuestionController::class, "formView"]);
//create
Route::get('/questions/create', [QuestionController::class, 'create']);
Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
//update
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
//
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::get("/students", [StudentsController::class, "index"]);


Route::middleware([RoomMiddleware::class])->prefix("room")->group(function () {
  Route::get("/", [AuthStudentController::class, "index"])->name("room.index");
  Route::post("/", [AuthStudentController::class, "form"]);

  Route::get("/questions", [StudentRoomController::class, "index"])->name("room.questions");
  Route::post("/questions", [StudentRoomController::class, "form"]);
});