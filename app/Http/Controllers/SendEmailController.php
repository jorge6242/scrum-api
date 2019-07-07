<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('send_email');
    }

    function send(Request $request)
    {
        $data = array(
            'name'      =>  'Name test',
            'message'   =>  'Message test',
        );
        Mail::to('jorge6242@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }
}
