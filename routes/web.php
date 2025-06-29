<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Room\AuthStudentController;
use App\Http\Controllers\Room\StudentRoomController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\RoomMiddleware;
use App\Http\Controllers\StudentsLeaderboardController;
use App\Http\Controllers\StudentsFormController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\Room\QuizController as RoomQuizController;

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

//main students
// Route::get('/halaman', function () {
//   return view('index');
// })->name('main.index');
// Route::get('/quiz', [QuizController::class, 'index']);
// Route::get('/form_student', [StudentsFormController::class, 'index']);
// Route::get('/homepage', [HomepageController::class, 'index']);
// Route::get('/leaderboard_student', [StudentsLeaderboardController::class, 'index']);
// Route::get('/profil', [ProfilController::class, 'index']);
// Route::get('/level', [LevelController::class, 'index']);


//create
Route::get('/questions/create', [QuestionController::class, 'create']);
Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
//update
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
//
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::get("/students", [StudentsController::class, "index"]);


Route::prefix("room")->group(function () {
  Route::get("/", [AuthStudentController::class, "index"])->name("room.index");
  Route::post("/", [AuthStudentController::class, "form"]);

  Route::middleware([RoomMiddleware::class])->group(function () {
    Route::get("homepage", [\App\Http\Controllers\Room\HomePageController::class, "index"])->name("room.homepage");
    Route::get("profile", [\App\Http\Controllers\Room\HomePageController::class, "profile"])->name("room.profile");
    Route::get("leaderboard", [\App\Http\Controllers\Room\HomePageController::class, "leaderboard"])->name("room.leaderboard");

    Route::get("difficulty", [StudentRoomController::class, "viewChoseDifficulty"])->name("room.difficulty");
    Route::get("difficulty/{level}/{difficulty_id}", [StudentRoomController::class, "choseDifficulty"])->name("room.difficulty.chose");

    Route::get("/quiz", [RoomQuizController::class, "index"])->name("room.quiz");
    Route::post("/quiz", [RoomQuizController::class, "form"]);
    Route::get("/form_question", [QuestionController::class, "formView"]);
  });
});
