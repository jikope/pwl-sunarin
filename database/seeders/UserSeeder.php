<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ["editor","contributor", "user"];
        for($i=0; $i<3;$i++){
            $user = User::create([
                "name" => "user-".$role[$i],
                "email" => $role[$i]."@gmail.com",
                "role" => $role[$i],
                "password" => Hash::make('fanfanfan'),
                "email_verified_at" => \Carbon\Carbon::now()
            ]);

          $roleUser = Role::where('name', $role[$i])->get();

          $user->assignRole($roleUser);
        }
    }
}
