<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InformationEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($userEmail)
    {
        $content = [
            "title" => "Tájékoztató email",
            "body" => "Értesítés időpont törléséről",
        ];
        
        Mail::to($userEmail)->send(new InformationEmail($content));
    
        return "Email küldése";
    }
}