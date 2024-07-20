<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory1 extends Model
{
    protected $table="sub_category1s";
    protected $fillable = [
        'name',
        'image',

    ];
    public function category(){
        return $this->belongsTo(Category::class, 'main_cat');
    }
}
