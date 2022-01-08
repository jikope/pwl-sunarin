<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'article_id', 'editor_id'];

    public function editor() {
        return $this->belongsTo(User::class, "editor_id");
    }

    public function article() {
        return $this->belongsTo(Article::class, "article_id");
    }
}
