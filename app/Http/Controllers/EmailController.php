<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class EmailController extends Controller
{
    public function index(){
 
        $this->MailHelper('aku','ini email saya','ayogaan@gmail.com');
	}
}
