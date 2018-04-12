<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Organization';
    public $timestamps = false;
    
}
