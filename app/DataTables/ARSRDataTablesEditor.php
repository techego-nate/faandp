<?php

namespace App\DataTables;

use App\ARSR;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;
class ARSRDataTablesEditor extends DataTablesEditor
{
    protected $model = ARSR::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'item_id' => 'required',
            'Project Number'  => 'required',
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
    
    public function created(Model $model, array $data) {
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
