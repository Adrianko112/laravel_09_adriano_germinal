<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;



class PublicController extends Controller
{
    public  $users = [
            [
                'name' => 'Adriano',
                'surname' => 'Germinal',
                'role' => 'CEO',
        ],
        [
            'name' => 'Luigi',
            'surname' => 'Bianchi',
            'role' => 'Personal Trainer',
        ],
        [
            'name' => 'Giulia',
            'surname' => 'Verdi',
            'role' => 'CFO',
        ],
    ];

    public function index()
    {
        return view('welcome');
    }

    public function aboutUs()
    {
       
    return view('about-us', ['users' => $this->users]);
    }

   public function aboutUsDetail ($name) {
  
    foreach ($this->users as $user) {
        if ($user['name'] == $name) {
            return view('about-us-detail', ['user' => $user]);
        }
    }
    }

    public function contacts() {
    return view('contacts');
    }
    

    public function contactUs (Request $request) {
        $user = $request->input('user');
        $email = $request->input('email');
        $message = $request->input('message');

        $user_data = compact('user', 'email', 'message');  

        Mail::to(users: $email)->send(mailable: new ContactMail($user_data));  
        return redirect()->route('home')->with('success','Hai inviato correttamente la tua mail, ti risponderemo al più presto!');

    }

    public function profile() 
    {
        return view('profile');
    }

}