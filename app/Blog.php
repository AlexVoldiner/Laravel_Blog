<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['public_date','title','preview','text', 'image'];
    public $timestamps = FALSE;
}
