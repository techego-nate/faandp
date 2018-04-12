<?php

namespace App\DataTables;

use App\Reclass;

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
include( "../../public/plugins/editor/php/DataTables.php" );
class ReclassDataTablesEditor_New extends DataTablesEditor
{
    protected $model = \App\Reclass::class;
    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'original-arsr-item' => 'required',
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
