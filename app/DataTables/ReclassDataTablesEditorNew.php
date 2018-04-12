<?php

namespace App\DataTables;

use App\Reclass;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class ReclassDataTablesEditorNew extends DataTablesEditor
{
    public $model = Reclass::class;
    
    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'id'  => 'required',
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
//            'id' => 'sometimes|required|' . Rule::unique($model->getTable())->ignore($model->getKey()),
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
//        $data['password'] = bcrypt($data['password']);

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
//        if (empty($data['password'])) {
//            unset($data['password']);
//        } else {
//            $data['password'] = bcrypt($data['password']);
//        }

        return $data;
    }
}