<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
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
            User::create([
                "name" => "user".$i,
                "email" => "user".$i."@gmail.com",
                "role" => $role[$i],
                "password" => Hash::make('fanfanfan'),
                "email_verified_at" => \Carbon\Carbon::now()
            ]);
        }
    }
}
