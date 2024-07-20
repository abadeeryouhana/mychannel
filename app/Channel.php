<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table="channells";
    protected $fillable = [
        'name',
        'arr',
        'image',

    ];
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subcategory1(){
        return $this->belongsTo(SubCategory1::class, 'sub_cat_1');
    }
    public function subcategory2(){
        return $this->belongsTo(SubCategory2::class, 'sub_cat_2');
    }
}
