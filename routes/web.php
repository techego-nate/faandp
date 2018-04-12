<?php

//use Datatables;
//use Yajra\Datatables\Html\Builder;
use App\DataTables\ARSRDataTable;
use App\DataTables\ARSRDataTablesEditor;
use App\DataTables\OverallDataTable;
use App\DataTables\ElementDataTable;
use App\DataTables\ReclassDataTable_New;
use App\DataTables\ReclassDataTablesEditorNew;

//Resources
//Route::resource('dashboard', 'HomeController');
//Route::resource('overall', 'OverallController');
//Route::resource('element', 'ElementController');


//Reclass
Route::resource('reclass', 'ReclassController');
//Route::get('/reclass', 'ReclassController@index');
//Route::post('/reclass', function(ReclassDataTablesEditorNew $reclassEditor){
//    return $reclassEditor->process(request());
//});


// Datatables
Route::get('/datatable', 'DatatablesController@datatable');
Route::get('/datatable/arsrdata', 'DatatablesController@arsrdata')->name('/datatable/getarsrdata');
Route::get('/datatable','DatatablesController@getIndex');
Route::get('/anyData','DatatablesController@anyData')->name('datatables.data');
Route::get('/elementsData/{element_name}','DatatablesController@elementsData')->name('datatables.elementsData');
Route::get('dashboard', 'HomeController@index');
Route::get('/overallData', 'DatatablesController@overallData');
Route::get('element/{element_name}', function(ElementDataTable $dataTable) {    return $dataTable->render('dashboard.{element_name}');
});
Route::get('/viewsData/{element_name}','DatatablesController@viewsData');
Route::get('/view','HomeController_working_old@view_dashboard');
Route::get('/getViewData/{view_item_id}','DatatablesController@arsrData');

// User indexing
Auth::routes();
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index')->name('home');
//Route::get('/home/{element_name}', 'HomeController_working_old@element_dashboard');
Route::get('/home/{element_name}', 'ElementController@index');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/users','UsersController@index');
Route::get('/users/create','UsersController@create');
Route::post('/users/create','UsersController@add');
Route::get('/users/delete/{user}', 'UsersController@delete');
Route::get('/users/update', 'UsersController@update');
Route::get('/users/{user}','UsersController@show');

// Test routes
Route::get('/test/editor', 'TestController@editor');
Route::get('/test/arsr', 'TestController@EditorTest');
Route::resource('tests', 'TestController');
Route::resource('arsr', 'ARSRController');
Route::get('arsr', function(ARSRDataTable $dataTable) {
    return $dataTable->render('arsr.index');
});
Route::post('arsrtwo', 'ARSRController@getAddEditRemoveColumnData');
Auth::routes();



//// Routes for testing editor crud functionality
//Route::resource('state','StateController');
