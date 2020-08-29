<?php

namespace App\Http\Controllers;

use App\Jobs\JobMail;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){

        return view('cadastro');
    }
    public function sendEmail(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        dd(JobMail::dispatch($user)->delay(now()->addSeconds(15)));
        // return response() ->json('Salvo',200);
        }
}
