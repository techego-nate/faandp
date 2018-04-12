<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclass extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
//    protected $guarded = ['id'];
    protected $table = 'Reclass';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "Change_task_title",
        "Change_org_title",
        "Change_obj_title",
        "Change_project_title",
        "Change_amount",
        "Approval_title",
    ];
    
     public function arsr(){
        return $this->belongsTo('App\ARSR', 'Original_arsr_id', 'item_id');
    }
    
//    public function arsr(){
//        return $this->belongsTo('App\ARSR', 'arsr_id');
//    }
    
    public function change_project(){
        return $this->belongsTo('App\Project', 'Project_id');
    }
    
    public function change_task(){
        return $this->belongsTo('App\Task', 'Task_id');
    }
    
    public function change_org(){
        return $this->belongsTo('App\Organization', 'Org_id');
    }
    
    public function change_obj_class(){
        return $this->belongsTo('App\ObjectClass', 'Obj_id');
    }
}