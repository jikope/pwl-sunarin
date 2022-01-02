<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Events\NotifSentEvent;
use App\Events\NotifCounterEvent;
use Auth;
class NotificationController extends Controller
{

    public function index(){
        return view('contributor.notif');
    }

    public function fetch(){
        return Notification::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
    }

    public function counter(){
       
        return $this->fetch()->where('isRead','0')->count();
    }
    public function send(Request $request){
        $message = Notification::create([
            'user_id'=>3,
            'title'=>$request->title,
            'message'=>$request->message,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
        $messages = Notification::where('user_id',3)->get();
        //dd($messages->count());
        Broadcast(new NotifSentEvent(3, $message));
        Broadcast(new NotifCounterEvent(3,$messages->count()));
        return 200;
    }

    public function setRead($id){
        Notification::findOrFail($id)->update(['isRead'=>'1']);
    }
}