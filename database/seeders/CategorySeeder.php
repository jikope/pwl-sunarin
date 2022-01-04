<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Proposal;

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

        Article::create([
            "user_id" => 3,
            "category_id" => 2,
            "title" => "Gambang Gangsa",
            "image" => "/images/informations/Motto To Love-Ru 08:00:19:39_1640353475.png",
            "content" => "<p>An archaic metallophone with between 16 and 19 bronze bars of graduated length resting on top of a trough-like wooden casing that serves as a resonator. The bars are struck with two small hammer-like beaters with heads made of buffalo horn or wood. The instrument produces a clear, penetrating metallic sound. <em>Gambang gongsa</em> are not typically found in gamelans manufactured after 1900 CE.&nbsp; When included, only one <em>gambang gongsa</em> is found in a gamelan. Its earlier (19<sup>th</sup> c.) playing style has been lost, though for gamelans including this instrument but no <em>saron peking</em> the upper register of the <em>gambang gangsa</em> is sometimes used as a <em>saron peking.</em></p>",
            "type" => "complete",
        ]);

        Article::create([
            "user_id" => 3,
            "category_id" => 2,
            "title" => "Gusti Kanjeng Nyai Ratu Kidul",
            "image" => "/images/informations/Gusti Kanjeng Nyai Ratu Kidul_1641093745.png",
            "content" => "<h1>alksjdlalskjdlaksjd</h1>",
            "type" => "complete",
        ]);

        Proposal::create([
            "editor_id" => 2,
            "article_id" => 1,
        ]);

        Proposal::create([
            "editor_id" => 5,
            "article_id" => 2,
        ]);
    }
}
