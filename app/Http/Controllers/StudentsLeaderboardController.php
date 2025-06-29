<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsLeaderboardController extends Controller
{
   
        public function index()
        {
            return view('main2/leaderboard_student');
        }
    
}
