<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Hash;
class SuperController extends Controller
{
    public function users(){
        $data = User::where('role','users')->paginate(10);

    }

    public function contributors(){
        $data = User::where('role','contributor')->paginate(10);
        
    }

    public function editors(){
        $data = User::where('role','editor')->paginate(10);

    }

    public function addeditors(){
        return view('auth.addeditor');
    }

    public function storeeditors(Request $request){
        $data = $request->except('_token');
        
        $user = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "role" => 'editor',
            "password" => Hash::make($data['password']),
            "email_verified_at" => \Carbon\Carbon::now()
        ]);

      $roleUser = Role::where('name', 'editor')->get();
      $user->assignRole($roleUser);
      //send email
      return redirect()->route('super.editors');     

    }


}
