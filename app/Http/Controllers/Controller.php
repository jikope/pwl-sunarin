<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function MailHelper($username, $body, $destination){
        $details = [

            'title' => 'Mail from Bacata',
            'greeting' => 'Hi'.$username,
            'body' => $body
    
        ];
    
        Mail::to($destination)->send(new NotifEmail($details));
    
        dd("Email is Sent.");
    }
}
