<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DataTables\ReclassDataTablesEditorNew;

class ARSR extends Model
{
    protected $connection = 'mysql';
    protected $table = 'ARSR';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "item_id",
        "Project Number",
        "Amount",   
    ];
    
    public function project(){
        return $this->belongsTo('App\Project', 'Project_id');
    }
    
    public function project_reclass(){
        return $this->belongsTo('App\Project', 'Project_Reclass_id');
    }
    
}
