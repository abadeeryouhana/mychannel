<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory2 extends Model
{
    protected $table="sub_category2s";
    protected $fillable = [
        'name',
        'image',

    ];
    public function sub_category(){
        return $this->belongsTo(SubCategory1::class, 'sub_cat');
    }
}
