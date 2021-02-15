<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request) {
        $user = array( 
            'email' => 'lsc1164@gmail.com',
            'name' => 'lee' 
        ); 
        $data = array( 
            'detail'=> 'Your awesome detail here', 
            'name' => $user['name'] 
        );
         Mail::send('emails.welcome', $data, function($message) use ($user) 
         { 
             $message->from('lsc1164@gmail.com', 'Kanda Master'); 
             $message->to($user['email'], $user['name'])->subject('Welcome!'); 
        }); 
        
        return 'Done!'; 
    }
}
