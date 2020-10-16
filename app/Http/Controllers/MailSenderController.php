<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class MailSenderController extends Controller
{
    public function send(Request $request)
    {
        try {
            Mail::to(env('MAIL_TO_SEND'))->send(new Contact(
                $request->name,
                $request->email,
                $request->message
            ));
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(['success' => false]);
        }
    }
}
