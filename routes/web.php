<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Auth::routes();
Route::get('/index', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/charts', function () {
    return view('mcharts');
});
Route::get('/tables', function () {
    return view('table');
});
Route::get('/forms', function () {
    return view('form');
});
Route::get('/grid', function () {
    return view('grid');
});
Route::get('/buttons', function () {
    return view('buttons');
});
Route::get('/icons', function () {
    return view('icons');
});
Route::get('/panels', function () {
    return view('panel');
});
Route::get('/typography', function () {
    return view('typography');
});
Route::get('/notifications', function () {
    return view('notifications');
});
Route::get('/blank', function () {
    return view('blank');
});
Route::get('/documentation', function () {
    return view('documentation');
});
Route::middleware('auth')->group(function () {
    //Roles
    //ruta 		//nombre de ruta 	//Permiso
    Route::post('/roles/store', 'RoleController@store')->name('roles.store')
                                ->middleware('permission:roles.create');
    Route::get('/roles', 'RoleController@index')->name('roles.index')
                                ->middleware('permission:roles.index');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create')
                                ->middleware('permission:roles.create');
    Route::put('/roles/{role}', 'RoleController@update')->name('roles.update')
                                ->middleware('permission:roles.edit');
    Route::get('/roles/{role}', 'RoleController@show')->name('roles.show')
                                ->middleware('permission:roles.show');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')
                                ->middleware('permission:roles.destroy');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
                                ->middleware('permission:roles.edit');
    //Users
    //ruta 		//nombre de ruta 	//Permiso
    Route::get('/users', 'UserController@index')->name('users.index')
                                ->middleware('permission:users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create')
                                ->middleware('permission:users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store')
                                ->middleware('permission:users.create');

    Route::put('/users/{user}', 'UserController@update')->name('users.update')
                                ->middleware('permission:users.edit');
    Route::get('/users/{user}', 'UserController@show')->name('users.show')
                                ->middleware('permission:users.show');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')
                                ->middleware('permission:users.destroy');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')
                                ->middleware('permission:users.edit');
    //Supplies
    //ruta 		//nombre de ruta 	//Permiso
    Route::post('/supplies/store', 'SuppliesController@store')->name('admin.supplies.store')
                                ->middleware('permission:admin.supplies.create');
    Route::get('/supplies/', 'SuppliesController@index')->name('admin.supplies.index')
                                ->middleware('permission:admin.supplies.index');
    Route::get('/supplies/create', 'SuppliesController@create')->name('admin.supplies.create')
                                ->middleware('permission:admin.supplies.create');
    Route::put('/supplies/{supplie}', 'SuppliesController@update')->name('admin.supplies.update')
                                ->middleware('permission:admin.supplies.edit');
    Route::get('/supplies/{supplie}', 'SuppliesController@show')->name('admin.supplies.show')
                                ->middleware('permission:admin.supplies.show');
    Route::delete('/supplies/{supplie}', 'SuppliesController@destroy')->name('admin.supplies.destroy')
                                ->middleware('permission:admin.supplies.destroy');
    Route::get('/supplies/{supplie}/edit', 'SuppliesController@edit')->name('admin.supplies.edit')
                                ->middleware('permission:admin.supplies.edit');

    //Rechazado
    //ruta 		//focod de la ruta	//Permiso
    Route::post('/rejecteds/store', 'MotivorejectedController@store')->name('admin.rejecteds.store')
                                ->middleware('permission:admin.rejecteds.create');
    Route::get('/rejecteds/', 'MotivorejectedController@index')->name('admin.rejecteds.index')
                                ->middleware('permission:admin.rejecteds.index');
    Route::get('/rejecteds/create', 'MotivorejectedController@create')->name('admin.rejecteds.create')
                                ->middleware('permission:admin.rejecteds.create');
    Route::put('/rejecteds/{motivorejected}', 'MotivorejectedController@update')->name('admin.rejecteds.update')
                                ->middleware('permission:admin.rejecteds.edit');
    Route::get('/rejecteds/{motivorejected}', 'MotivorejectedController@show')->name('admin.rejecteds.show')
                                ->middleware('permission:admin.rejecteds.show');
    Route::delete('/rejecteds/{motivorejected}', 'MotivorejectedController@destroy')->name('admin.rejecteds.destroy')
                                ->middleware('permission:admin.rejecteds.destroy');
    Route::get('/rejecteds/{motivorejected}/edit', 'MotivorejectedController@edit')->name('admin.rejecteds.edit')
                                ->middleware('permission:admin.rejecteds.edit');

    //Reception
    //ruta 		//nombre de ruta 	//Permiso
    Route::post('/receptions/store', 'ReceptionController@store')->name('receptions.store')
                                ->middleware('permission:receptions.create');
    Route::get('/receptions', 'ReceptionController@index')->name('receptions.index')
                                ->middleware('permission:receptions.index');

    Route::get('/receptionsdaily', 'ReceptionController@receptionsdaily')->name('receptions.receptionsdaily')
                                ->middleware('permission:receptions.receptionsdaily');
    Route::get('/receptionsperfruit', 'ReceptionController@receptionsperfruit')->name('receptions.receptionsperfruit')
                                ->middleware('permission:receptions.receptionsperfruit');
    Route::get('/receptionsperproductor', 'ReceptionController@receptionsperproductor')->name('receptions.receptionsperproductor')
                                ->middleware('permission:receptions.receptionsperproductor');

    Route::get('/inprocess', 'ReceptionController@inprocess')->name('receptions.inprocess'); //agregar permiso

    Route::get('/receptions/create', 'ReceptionController@create')->name('receptions.create')
                                ->middleware('permission:receptions.create');
    Route::put('/receptions/{reception}', 'ReceptionController@update')->name('receptions.update')
                                ->middleware('permission:receptions.edit');
    Route::get('/receptions/{reception}', 'ReceptionController@show')->name('receptions.show')
                                ->middleware('permission:receptions.show');
    Route::delete('/receptions/{reception}', 'ReceptionController@destroy')->name('receptions.destroy')
                                ->middleware('permission:receptions.destroy');
    Route::get('/receptions/{reception}/edit', 'ReceptionController@edit')->name('receptions.edit')
                                ->middleware('permission:receptions.edit');
    Route::get('receptionChange', 'ReceptionController@ChangeStatusTrue')->name('receptions.change')
                                ->middleware('permission:receptions.edit');

    //Consulta Ajax Select

    //Process
    //ruta 		//referencia de la ruta 	//con la función...
    Route::get('/processes/create', 'ProcessController@create')->name('process.processes.create')
                                ->middleware('permission:process.processes.create');
    Route::post('/processes/store', 'ProcessController@store')->name('process.processes.store')
                                ->middleware('permission:process.processes.create');
    Route::get('/processes', 'ProcessController@index')
                    ->name('process.processes.index')
                                ->middleware('permission:process.processes.index');
    Route::put('/processes/{process}', 'ProcessController@update')->name('process.processes.update')
                                ->middleware('permission:process.processes.edit');
    Route::get('/processes/{process}', 'ProcessController@show')->name('process.processes.show')
                                ->middleware('permission:process.processes.show');

    Route::delete('/processes/{process}', 'ProcessController@destroy')->name('process.processes.destroy')
                                ->middleware('permission:process.processes.destroy');

    Route::get('/processes/{process}/edit', 'ProcessController@edit')->name('process.processes.edit')
                                ->middleware('permission:process.processes.edit');

    //SubProcess

    Route::get('/subprocess/create/{subprocess}', 'SubProcessController@create')
                                ->name('subprocess.create')
                                ->middleware('permission:subprocess.create');

    Route::post('/subprocess/store', 'SubProcessController@store')
                                ->name('subprocess.store')
                                ->middleware('permission:subprocess.create');

    Route::get('/subprocess', 'SubProcessController@index')
                                ->name('subprocess.index')
                                ->middleware('permission:subprocess.index');

    Route::put('/subprocess/{subprocess}', 'SubProcessController@update')
                                ->name('subprocess.update')
                                ->middleware('permission:subprocess.edit');

    Route::get('/subprocess/{subprocess}', 'SubProcessController@show')
                                ->name('subprocess.show')
                                ->middleware('permission:subprocess.show');

    Route::delete('/subprocess/{subprocess}', 'SubProcessController@destroy')
                                ->name('subprocess.destroy')
                                ->middleware('permission:subprocess.destroy');

    Route::get('/subprocess/{subprocess}/edit', 'SubProcessController@edit')
                                ->name('subprocess.edit')
                                ->middleware('permission:subprocess.edit');

    //Proveederoes
    Route::post('/providers/store', 'ProviderController@store')
                    ->name('admin.providers.store')
                                ->middleware('permission:admin.providers.create');

    Route::get('/providers/', 'ProviderController@index')
                    ->name('admin.providers.index')
                                ->middleware('permission:admin.providers.index');

    Route::get('/providers/create', 'ProviderController@create')
                    ->name('admin.providers.create')
                                ->middleware('permission:admin.providers.create');

    Route::put('/providers/{provider}', 'ProviderController@update')
                    ->name('admin.providers.update')
                                ->middleware('permission:admin.providers.edit');

    Route::get('/providers/{provider}', 'ProviderController@show')
                    ->name('admin.providers.show')
                                ->middleware('permission:admin.providers.show');

    Route::delete('/providers/{provider}', 'ProviderController@destroy')->name('admin.providers.destroy')
                                ->middleware('permission:admin.providers.destroy');

    Route::get('/providers/{provider}/edit', 'ProviderController@edit')->name('admin.providers.edit')
                                ->middleware('permission:admin.providers.edit');

    //Fruta
    Route::post('/fruits/store', 'FruitController@store')
                    ->name('admin.fruits.store')
                                ->middleware('permission:admin.fruits.create');

    Route::get('/fruits/', 'FruitController@index')
                    ->name('admin.fruits.index')
                                ->middleware('permission:admin.fruits.index');

    Route::get('/fruits/create', 'FruitController@create')
                    ->name('admin.fruits.create')
                                ->middleware('permission:admin.fruits.create');

    Route::put('/fruits/{fruit}', 'FruitController@update')
                    ->name('admin.fruits.update')
                                ->middleware('permission:admin.fruits.edit');

    Route::get('/fruits/{fruit}', 'FruitController@show')
                    ->name('admin.fruits.show')
                                ->middleware('permission:admin.fruits.show');

    Route::delete('/fruits/{fruit}', 'FruitController@destroy')->name('admin.fruits.destroy')
                                ->middleware('permission:admin.fruits.destroy');

    Route::get('/fruits/{fruit}/edit', 'FruitController@edit')->name('admin.fruits.edit')
                                ->middleware('permission:admin.fruits.edit');

    //Variead de fruta
    Route::post('/varieties/store', 'VarietyController@store')
                    ->name('admin.varieties.store')
                                ->middleware('permission:admin.varieties.create');

    Route::get('/varieties/', 'VarietyController@index')
                    ->name('admin.varieties.index')
                                ->middleware('permission:admin.varieties.index');

    Route::get('/varieties/create', 'VarietyController@create')
                    ->name('admin.varieties.create')
                                ->middleware('permission:admin.varieties.create');

    Route::put('/varieties/{variety}', 'VarietyController@update')
                    ->name('admin.varieties.update')
                                ->middleware('permission:admin.varieties.edit');

    Route::get('/varieties/{variety}', 'VarietyController@show')
                    ->name('admin.varieties.show')
                                ->middleware('permission:admin.varieties.show');

    Route::delete('/varieties/{variety}', 'VarietyController@destroy')->name('admin.varieties.destroy')
                                ->middleware('permission:admin.varieties.destroy');

    Route::get('/varieties/{variety}/edit', 'VarietyController@edit')->name('admin.varieties.edit')
                                ->middleware('permission:admin.varieties.edit');

    //Formato

    Route::post('/formats/store', 'FormatController@store')
                    ->name('admin.formats.store')
                                ->middleware('permission:admin.formats.create');

    Route::get('/formats/', 'FormatController@index')
                    ->name('admin.formats.index')
                                ->middleware('permission:admin.formats.index');

    Route::get('/formats/create', 'FormatController@create')
                    ->name('admin.formats.create')
                                ->middleware('permission:admin.formats.create');

    Route::put('/formats/{format}', 'FormatController@update')
                    ->name('admin.formats.update')
                                ->middleware('permission:admin.formats.edit');

    Route::get('/formats/{format}', 'FormatController@show')
                    ->name('admin.formats.show')
                                ->middleware('permission:admin.formats.show');

    Route::delete('/formats/{format}', 'FormatController@destroy')->name('admin.formats.destroy')
                                ->middleware('permission:admin.formats.destroy');

    Route::get('/formats/{format}/edit', 'FormatController@edit')->name('admin.formats.edit')
                                ->middleware('permission:admin.formats.edit');

    //Quality
    Route::post('/quality/store', 'QualityController@store')
    ->name('admin.quality.store')
                ->middleware('permission:admin.quality.create');

    Route::get('/quality/', 'QualityController@index')
    ->name('admin.quality.index')
                ->middleware('permission:admin.quality.index');

    Route::get('/quality/create', 'QualityController@create')
    ->name('admin.quality.create')
                ->middleware('permission:admin.quality.create');

    Route::put('/quality/{quality}', 'QualityController@update')
    ->name('admin.quality.update')
                ->middleware('permission:admin.quality.edit');

    Route::get('/quality/{quality}', 'QualityController@show')
    ->name('admin.quality.show')
                ->middleware('permission:admin.quality.show');

    Route::delete('/quality/{quality}', 'QualityController@destroy')->name('admin.quality.destroy')
                ->middleware('permission:admin.quality.destroy');

    Route::get('/quality/{quality}/edit', 'QualityController@edit')->name('admin.quality.edit')
                ->middleware('permission:admin.quality.edit');

    //Exportadores
    Route::post('/exporters/store', 'ExporterController@store')
->name('admin.exporters.store')
            ->middleware('permission:admin.exporters.create');

    Route::get('/exporters/', 'ExporterController@index')
->name('admin.exporters.index')
            ->middleware('permission:admin.exporters.index');

    Route::get('/exporters/create', 'ExporterController@create')
->name('admin.exporters.create')
            ->middleware('permission:admin.exporters.create');

    Route::put('/exporters/{exporter}', 'ExporterController@update')
->name('admin.exporters.update')
            ->middleware('permission:admin.exporters.edit');

    Route::get('/exporters/{exporter}', 'ExporterController@show')
->name('admin.exporter.show')
            ->middleware('permission:admin.exporter.show');

    Route::delete('/exporter/{exporter}', 'ExporterController@destroy')->name('admin.exporters.destroy')
            ->middleware('permission:admin.exporters.destroy');

    Route::get('/exporters/{exporter}/edit', 'ExporterController@edit')->name('admin.exporters.edit')
            ->middleware('permission:admin.exporters.edit');

    //Season
    Route::post('/seasons/store', 'SeasonController@store')
->name('admin.seasons.store')
            ->middleware('permission:admin.seasons.create');

    Route::get('/seasons', 'SeasonController@index')
->name('admin.seasons.index')
            ->middleware('permission:admin.seasons.index');

    Route::get('/seasons/create', 'SeasonController@create')
->name('admin.seasons.create')
            ->middleware('permission:admin.seasons.create');

    Route::put('/seasons/{season}', 'SeasonController@update')
->name('admin.seasons.update')
            ->middleware('permission:admin.seasons.edit');

    Route::get('/seasons/{season}', 'SeasonController@show')
->name('admin.season.show')
            ->middleware('permission:admin.season.show');

    Route::delete('/season/{season}', 'SeasonController@destroy')->name('admin.seasons.destroy')
            ->middleware('permission:admin.seasons.destroy');

    Route::get('/seasons/{season}/edit', 'SeasonController@edit')->name('admin.seasons.edit')
            ->middleware('permission:admin.seasons.edit');

    //Despachos

    Route::post('/dispatch/store', 'DispatchController@store')
->name('dispatch.store')
            ->middleware('permission:dispatch.create');

    Route::get('/dispatch', 'DispatchController@index')
->name('dispatch.index')
            ->middleware('permission:dispatch.index');

    Route::get('/dispatch/create', 'DispatchController@create')
->name('dispatch.create')
            ->middleware('permission:dispatch.create');

    Route::put('/dispatch/{dispatch}', 'DispatchController@update')
->name('dispatch.update')
            ->middleware('permission:dispatch.edit');

    Route::get('/dispatch/{dispatch}', 'DispatchController@show')
->name('dispatch.show')
            ->middleware('permission:dispatch.show');

    Route::delete('/dispatch/{dispatch}', 'dispatchcontroller@destroy')->name('dispatch.destroy')
            ->middleware('permission:dispatch.destroy');

    Route::get('/dispatch/{dispatch}/edit', 'dispatchcontroller@edit')->name('dispatch.edit')
            ->middleware('permission:dispatch.edit');

    Route::get('/camara', 'dispatchcontroller@getProcess')
            ->name('dispatch.getProcess')
                ->middleware('permission:dispatch.getProcess');




    //TipoDespacho
    Route::post('/tipodispatches/store', 'TipoDispatchController@store')->name('admin.tipodispatches.store')->middleware('permission:admin.tipodispatches.create');

    Route::get('/tipodispatches', 'TipoDispatchController@index')->name('admin.tipodispatches.index')
            ->middleware('permission:admin.tipodispatches.index');

    Route::get('/tipodispatches/create', 'TipoDispatchController@create')->name('admin.tipodispatches.create')->middleware('permission:admin.tipodispatches.create');

    Route::put('/tipodispatches/{tipodispatch}', 'TipoDispatchController@update')->name('admin.tipodispatches.update')->middleware('permission:admin.tipodispatches.edit');

    Route::get('/tipodispatches/{tipodispatch}', 'TipoDispatchContr oller@show')->name('admin.tipodispatch.show')->middleware('permission:admin.tipodispatch.show');

    Route::delete('/tipodispatch/{tipodispatch}', 'TipoDispatchController@destroy')->name('admin.tipodispatches.destroy')->middleware('permission:admin.tipodispatches.destroy');

    Route::get('/tipodispatches/{tipodispatch}/edit', 'TipoDispatchController@edit')->name('admin.tipodispatches.edit')->middleware('permission:admin.tipodispatches.edit');


    //Estatus

    Route::post('/statuses/store', 'StatusController@store')
    ->name('admin.statuses.store')
                ->middleware('permission:admin.statuses.create');

    Route::get('/statuses', 'StatusController@index')
    ->name('admin.statuses.index')
                ->middleware('permission:admin.statuses.index');

    Route::get('/statuses/create', 'StatusController@create')
    ->name('admin.statuses.create')
                ->middleware('permission:admin.statuses.create');

    Route::put('/statuses/{status}', 'StatusController@update')
    ->name('admin.statuses.update')
                ->middleware('permission:admin.statuses.edit');

    Route::get('/statuses/{status}', 'StatusController@show')
    ->name('admin.statuses.show')
                ->middleware('permission:admin.statuses.show');

    Route::delete('/statuses/{status}', 'StatusController@destroy')->name('admin.statuses.destroy')
                ->middleware('permission:admin.statuses.destroy');

    Route::get('/statuses/{status}/edit', 'StatusController@edit')->name('admin.statuses.edit')
                ->middleware('permission:admin.statuses.edit');

    //TrayINNNNNNNNsssssssssssssssssssssssssssssssssssss STORE


      Route::post('/trays/store', 'TrayInController@store')
    ->name('admin.trays.store')
                ->middleware('permission:admin.trays.create');

    Route::get('/trays', 'TrayInController@index')
    ->name('admin.trays.index')
                ->middleware('permission:admin.trays.index');

    Route::get('/trays/create', 'TrayInController@create')
    ->name('admin.trays.create')
                ->middleware('permission:admin.trays.create');

    Route::put('/trays/{tray}', 'TrayInController@update')
    ->name('admin.trays.update')
                ->middleware('permission:admin.trays.edit');

    Route::get('/trays/{tray}', 'TrayInController@show')
    ->name('admin.trays.show')
                ->middleware('permission:admin.trays.show');

    Route::delete('/trays/{tray}', 'TrayInController@destroy')->name('admin.trays.destroy')
                ->middleware('permission:admin.trays.destroy');

    Route::get('/trays/{tray}/edit', 'TrayInController@edit')->name('admin.trays.edit')
                ->middleware('permission:admin.trays.edit');
                


});
