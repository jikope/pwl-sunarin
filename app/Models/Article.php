<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ["user_id",'image', "category_id", "title" ,"content", "type"];

    public function category() {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function proposal() {
        return $this->hasOne(Proposal::class);
    }
  
    public function writer() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
