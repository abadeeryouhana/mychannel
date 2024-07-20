<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'admob id',
        'start app id',
        'Admob Ad Banner',
        'start Banner',
        'Admob INTERSTITIAL',
        'start Admob INTERSTITIAL',
        'Admob gift',
        'start gift'

    ];
}
