<?php

namespace App\Http\Controllers;

use App\Jobs\JobMail;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function sendEmail(Request $request){
        
        JobMail::dispatch($request->senderemail,$request->content)->delay(now()->addSeconds(15));
        return redirect()->route('sendMail')->with('status', 'Email Enviado');
        }
}
