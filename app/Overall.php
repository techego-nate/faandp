<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overall extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Overall';
    public $timestamps = false;
}
