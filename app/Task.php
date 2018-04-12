<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Tasks';
    public $timestamps = false;
    
}
