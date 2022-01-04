<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Supa-Admin']);
    }

    public function index()
    {
        $users = User::role(['editor', 'contributor'])->get();

        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if(!$user) {
            return redirect()->back();
        }

        $roleUser = Role::where('name', $data['role'])->first();
        $user->assignRole($roleUser);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roleUser = Role::where('name', $request['role'])->first();

        $user->roles()->detach();
        $user->assignRole($roleUser);
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users.index');
    }

    // GONE ARFAN

    public function users()
    {
        $data = User::where('role', 'users')->paginate(10);
    }

    public function contributors()
    {
        $data = User::where('role', 'contributor')->paginate(10);
    }

    public function editors()
    {
        $data = User::where('role', 'editor')->paginate(10);
    }

    public function addeditors()
    {
        return view('auth.addeditor');
    }

    public function storeeditors(Request $request)
    {
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
