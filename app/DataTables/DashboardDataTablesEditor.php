<?php

namespace App\DataTables;

use App\Overall;
use App\Element;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class DashboardDataTablesEditor extends DataTablesEditor
{
    protected $model = Overall::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'Annual Budget' => 'required'
          ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            'id' => 'sometimes|required' . Rule::unique($model->getTable())->ignore($model->getKey()),
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }
    
    /**
    * Pre-create action event hook.
    *
    * @param Model $model
    * @return array
    */
    public function creating(Model $model, array $data)
    {
        return $data;
    }
    
    /**
    * Pre-update action event hook.
    *
    * @param Model $model
    * @return array
    */
    public function updating(Model $model, array $data)
    {
        return $data;
    }
}
