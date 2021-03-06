<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function parent(){

        return $this->belongsTo(Category::class,'category_id');
    }
    public function childrens(){
        return $this->hasMany(Category::class,'category_id');
    }
    public static function categoriesParent(){
        return Category::query()->where('category_id',null)->get();
    }
}
