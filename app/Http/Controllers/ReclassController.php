<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ReclassDataTable_New;
use App\DataTables\ReclassDataTablesEditorNew;
use App\DataTables\ReclassDataTable_Approval;
use App\Project;
use App\Task;
use App\Organization;
use App\ObjectClass;
use App\Reclass;
use Datatables;

class ReclassController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }    
    
    public function index(ReclassDataTable_New $newReclassTable, ReclassDataTable_Approval $approvalReclassTable, Project $Project, Task $Task, Organization $Organization, ObjectClass $ObjectClass, Reclass $reclass)
    {
        $allProjects = $Project::all();
        $allTasks = $Task::all();
        $allOrgs = $Organization::all();
        $allObjClass = $ObjectClass::all();
        $allReclass = $reclass::with('arsr')->get();
        
        $projectDropdownOptions = [];
        foreach($allProjects as $project){
            $projectDropdownOptions[] = [ "label" => $project->Title, "value" => $project->Title];    
        }
        
        $taskDropdownOptions = [];
        foreach($allTasks as $task){
            $taskDropdownOptions[] = [ "label" => $task->{"Task Code"}, "value" => $task->{"Task Code"}];    
        }
        
        $orgDropdownOptions = [];
        foreach($allOrgs as $org){
            $orgDropdownOptions[] = [ "label" => $org->{"Org Code"}, "value" => $org->{"Org Code"}];    
        }
        
        $objClassDropdownOptions = [];
        foreach($allObjClass as $objClass){
            $objClassDropdownOptions[] = [ "label" => $objClass->{"OBJ Class Code"}, "value" => $objClass->{"OBJ Class Code"}];    
        }
        
        $reclassTotal = 0;
        foreach($allReclass as $reclassRow){
            $reclassTotal += $reclassRow->arsr->Amount;
        }
        
        $projectDropdownOptionsJSON = json_encode($projectDropdownOptions);
        $taskDropdownOptionsJSON = json_encode($taskDropdownOptions);
        $orgDropdownOptionsJSON = json_encode($orgDropdownOptions);
        $objClassDropdownOptionsJSON = json_encode($objClassDropdownOptions);
        
        if (request()->get('type') == 'approval') {
            return $approvalReclassTable->render('tools.reclass', compact('newReclassTable', 'approvalReclassTable', 'projectDropdownOptionsJSON', 'taskDropdownOptionsJSON', 'orgDropdownOptionsJSON', 'objClassDropdownOptionsJSON', 'reclassTotal'));
        }
        return $newReclassTable->render('tools.reclass', compact('newReclassTable', 'approvalReclassTable', 'projectDropdownOptionsJSON', 'taskDropdownOptionsJSON', 'orgDropdownOptionsJSON', 'objClassDropdownOptionsJSON', 'reclassTotal'));
    }
    
    public function store(ReclassDataTablesEditorNew $editor)
    {
        return $editor->process(request());
    }
}
