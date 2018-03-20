<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $title = 'Контакты';

        return view('contact', ['title' => $title]);
    }

    public function store(Request $request){

        $feedBack = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
//        dd($feedBack);
        if (Feedback::create($feedBack)) {
            return back()->with('success', 'Спасибо, Ваше сообщение получено');
        }

        return back()->with('error', 'error');
    }
}
