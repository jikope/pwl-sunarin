<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(["category" => "default_category"]);
        Category::create(["category" => "Technology"]);
        Category::create(["category" => "Sport"]);
        Category::create(["category" => "Music"]);
    }
}
