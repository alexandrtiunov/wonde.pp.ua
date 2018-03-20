<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index(){

        $title = 'Admin/Feedback';

        $feedback = Feedback::all();

        return view('news.feedback', ['feedback' => $feedback, 'title' => $title]);
    }
}
