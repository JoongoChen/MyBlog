<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->published()->latest()->paginate(20);
        return view('questions.index',compact('questions'));
    }
}
