<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectClass extends Model
{
    protected $connection = 'mysql';
    protected $table = 'ObjectClass';
    public $timestamps = false;
    
}
