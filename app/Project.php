<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Project';
    public $timestamps = false;
    
}
