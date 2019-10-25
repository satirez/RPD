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

Route::middleware('auth')->group(function () {
    //Roles
    //ruta 		//nombre de ruta 	//Permiso

    Route::post('/roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('/roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::put('/roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::get('/roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');

    //Users
    //ruta 		//nombre de ruta 	//Permiso

    Route::get('/users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');

    Route::put('/users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
    Route::get('/users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

    //Supplies
    //ruta 		//nombre de ruta 	//Permiso

    Route::get('/supplies', 'SuppliesController@index')->name('admin.supplies.index')->middleware('permission:admin.supplies.index');
    Route::get('/supplies/create', 'SuppliesController@create')->name('admin.supplies.create')->middleware('permission:admin.supplies.create');
    Route::post('/supplies/store', 'SuppliesController@store')->name('admin.supplies.store')->middleware('permission:admin.supplies.create');

    Route::put('/supplies/{supplie}', 'SuppliesController@update')->name('admin.supplies.update')->middleware('permission:admin.supplies.edit');
    Route::get('/supplies/{supplie}', 'SuppliesController@show')->name('admin.supplies.show')->middleware('permission:admin.supplies.show');
    Route::delete('/supplies/{supplie}', 'SuppliesController@destroy')->name('admin.supplies.destroy')->middleware('permission:admin.supplies.destroy');
    Route::get('/supplies/{supplie}/edit', 'SuppliesController@edit')->name('admin.supplies.edit')->middleware('permission:admin.supplies.edit');

    //Auditoria
    Route::get('/auditoria/rejected/', 'auditoriaController@index')->name('auditoria.index')->middleware('permission:auditoria.index');
    Route::get('/auditoria/rejectedLote/', 'auditoriaController@indexLote')->name('auditoria.index')->middleware('permission:auditoria.index');
    Route::get('/auditoria/rejectedReception/', 'auditoriaController@indexReception')->name('auditoria.index')->middleware('permission:auditoria.index');

    Route::get('/auditoria/rejected/{id}', 'auditoriaController@update')->name('auditoria.update')->middleware('permission:auditoria.edit');
    Route::get('/auditoria/rejectedLote/{id}', 'auditoriaController@updateLote')->name('auditoria.update')->middleware('permission:auditoria.edit');
    Route::get('/auditoria/rejectedReception/{id}', 'auditoriaController@updateReception')->name('auditoria.update')->middleware('permission:auditoria.edit');

    //Rechazado
    //ruta 		//focod de la ruta	//Permiso

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('rejecteds', 'MotivorejectedController')->names('admin.rejecteds')->parameters(['rejecteds' => 'motivorejected']);
    });

    Route::post('/rejecteds/store', 'MotivorejectedController@store')->name('admin.rejecteds.store')->middleware('permission:admin.rejecteds.create');
    Route::get('/rejecteds', 'MotivorejectedController@index')->name('admin.rejecteds.index')->middleware('permission:admin.rejecteds.index');
    Route::get('/rejecteds/create', 'MotivorejectedController@create')->name('admin.rejecteds.create')->middleware('permission:admin.rejecteds.create');
    Route::put('/rejecteds/{motivorejected}', 'MotivorejectedController@update')->name('admin.rejecteds.update')->middleware('permission:admin.rejecteds.edit');
    Route::get('/rejecteds/{motivorejected}', 'MotivorejectedController@show')->name('admin.rejecteds.show')->middleware('permission:admin.rejecteds.show');
    Route::delete('/rejecteds/{motivorejected}', 'MotivorejectedController@destroy')->name('admin.rejecteds.destroy')->middleware('permission:admin.rejecteds.destroy');
    Route::get('/rejecteds/{motivorejected}/edit', 'MotivorejectedController@edit')->name('admin.rejecteds.edit')->middleware('permission:admin.rejecteds.edit');

    //Reception
    //ruta 		//nombre de ruta 	//Permiso
    Route::post('/receptions/store', 'ReceptionController@store')->name('receptions.store')
        ->middleware('permission:receptions.create');
    Route::get('/receptions', 'ReceptionController@index')->name('receptions.index')
        ->middleware('permission:receptions.index');

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

    Route::get('reception-list', 'ReceptionController@getData');
    Route::get('lotes-list', 'LoteController@getData');
    Route::get('subprocess-list', 'SubProcessController@getData');
    Route::get('process-list', 'ProcessController@getData');

    // START reportes

    // Recepcion View
    Route::get('/receptionsdaily', 'ReceptionController@receptionsdaily')->name('receptions.receptionsdaily');
    Route::get('/receptionsperfruit', 'ReceptionController@receptionsperfruit')->name('receptions.receptionsperfruit');
    Route::get('/receptionsperproductor', 'ReceptionController@receptionsperproductor')->name('receptions.receptionsperproductor');

    // Recepcion Search

    Route::post('receptionproductorsearch', 'ReceptionController@productortotal')->name('receptionproductor');
    Route::post('receptionfruitsearch', 'ReceptionController@fruittotal')->name('receptionfruit');
    Route::post('receptiondailysearch', 'ReceptionController@dailytotal')->name('receptiondailysearch');

    // Proceso View
    Route::get('/processDaily', 'ReportesController@reporteProcesoDaily')->name('reporteProcesoDaily');
    Route::get('/processFruit', 'ReportesController@reporteProcesoFruit')->name('reporteProcesoFruit');
    Route::get('/processProvider', 'ReportesController@reporteProcesoProvider')->name('reporteProcesoProvider');

    // Proceso search
    Route::post('reporteProcesoDailySearch', 'ReportesController@reporteProcesoDailySearch')->name('reporteProcesoDailySearch');
    Route::post('reporteProcesoFruitSearch', 'ReportesController@reporteProcesoFruitSearch')->name('reporteProcesoFruitSearch');
    Route::post('reporteProcesoProviderSearch', 'ReportesController@reporteProcesoProviderSearch')->name('reporteProcesoProviderSearch');

    //Despacho View
    Route::get('/dispatchDaily', 'ReportesController@reporteDespachoDaily')->name('reporteDespachoDaily');
    Route::get('/dispatchFruit', 'ReportesController@reporteDespachoFruit')->name('reporteDespachoFruit');
    Route::get('/dispatchProvider', 'ReportesController@reporteDespachoProvider')->name('reporteDespachoProvider');

    //Despacho Search
    Route::post('/dispatchDailySearch', 'ReportesController@reporteDespachoDailySearch')->name('reporteDespachoDailySearch');
    Route::post('/dispatchFruitSearch', 'ReportesController@reporteDespachoFruitSearch')->name('reporteDespachoFruitSearch');
    Route::post('/dispatchProviderSearch', 'ReportesController@reporteDespachoProviderSearch')->name('reporteDespachoProviderSearch');

    // END REPORTES

    Route::get('/printreception/{reception}', 'ReceptionController@print')->name('receptions.print');
    Route::get('/printdispatch/{dispatch}', 'DispatchController@print')->name('dispatchs.print');
    Route::get('/printsubprocess/{subprocess}', 'SubProcessController@print')->name('subprocess.print');
    Route::get('/printlote/{lote}', 'LoteController@print')->name('lotes.print');

    //Consulta Ajax Select

    //Process
    //ruta 		//referencia de la ruta 	//con la función...

    Route::get('/processes/create', 'ProcessController@create')->name('process.processes.create')->middleware('permission:process.processes.create');
    Route::post('/processes/store', 'ProcessController@store')->name('process.processes.store')->middleware('permission:process.processes.create');
    Route::get('/processes', 'ProcessController@index')->name('process.processes.index')->middleware('permission:process.processes.index');
    Route::put('/processes/{process}', 'ProcessController@update')->name('process.processes.update')->middleware('permission:process.processes.edit');
    Route::get('/processes/{process}', 'ProcessController@show')->name('process.processes.show')->middleware('permission:process.processes.show');

    Route::delete('/processes/{process}', 'ProcessController@destroy')->name('process.processes.destroy')->middleware('permission:process.processes.destroy');

    Route::get('/processes/{process}/edit', 'ProcessController@edit')->name('process.processes.edit')->middleware('permission:process.processes.edit');

    // reproceso

    Route::get('/reprocesses/create', 'ReprocessController@create')->name('reprocess.reprocesses.create')->middleware('permission:reprocess.reprocesses.create');
    Route::post('/reprocesses/store', 'ReprocessController@store')->name('reprocess.reprocesses.store')->middleware('permission:reprocess.reprocesses.create');
    Route::get('/reprocesses', 'ReprocessController@index')->name('reprocess.reprocesses.index')->middleware('permission:reprocess.reprocesses.index');
    Route::put('/reprocesses/{reprocess}', 'ReprocessController@update')->name('reprocess.reprocesses.update')->middleware('permission:reprocess.reprocesses.edit');
    Route::get('/reprocesses/{reprocess}', 'ReprocessController@show')->name('reprocess.reprocesses.show')->middleware('permission:reprocess.reprocesses.show');

    Route::get('/reprocesses/{reprocess}', 'ReprocessController@show')->name('reprocess.reprocesses.show')->middleware('permission:reprocess.reprocesses.show');


    Route::get('reprocess-list', 'ReprocessController@getData');

    Route::get('/reprocesses/{reprocess}/edit', 'ReprocessController@edit')->name('reprocess.reprocesses.edit')->middleware('permission:reprocess.reprocesses.edit');

    // resubproceso

    Route::get('/subreprocesses/create/{reprocess_id}/{identificador}', 'SubReprocessController@create')->name('subreprocess.create')->middleware('permission:subreprocesses.create');
    Route::post('/subreprocesses/store', 'SubReprocessController@store')->name('subreprocess.store')->middleware('permission:subreprocesses.create');
    Route::get('/subreprocesses', 'SubReprocessController@index')->name('subreprocess.index')->middleware('permission:subreprocesses.index');
    Route::put('/subreprocesses/{subreprocess}', 'SubReprocessController@update')->name('subreprocess.update')->middleware('permission:subreprocesses.edit');
    Route::get('/subreprocesses/{subreprocess}', 'SubReprocessController@show')->name('subreprocess.show')->middleware('permission:subreprocesses.show');

    Route::delete('/subreprocesses/{subreprocess}', 'SubReprocessController@destroy')->name('subreprocess.destroy')->middleware('permission:subreprocesses.destroy');

    Route::get('/subreprocesses/{subreprocess}/edit', 'SubReprocessController@edit')->name('subreprocess.edit')->middleware('permission:subreprocesses.edit');

    // lote
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('lotes', 'LoteController')->names('lotes')->parameters(['lotes' => 'lote']);
    });

    Route::post('/lotescreate', 'LoteController@create')->name('lote.createrial');

    Route::get('/createsearch', 'LoteController@createsearch')->name('lote.createsearch');

    Route::get('/camaralote', 'LoteController@getLotes')->name('Lote.getLotes')->middleware('permission:Lote.index');

    //SubProcess

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('subprocess', 'SubProcessController')->names('subprocess')->parameters(['subprocess' => 'subprocess']);
    });

    Route::get('/subprocess/create/{subprocess}', 'SubProcessController@create')->name('subprocess.create')->middleware('permission:subprocess.create');

    Route::post('/subprocess/store', 'SubProcessController@store')->name('subprocess.store')->middleware('permission:subprocess.create');

    Route::get('/subprocess', 'SubProcessController@index')->name('subprocess.index')->middleware('permission:subprocess.index');

    Route::put('/auditoria/rejected/{subprocess}', 'SubProcessController@update')->name('subprocess.update')->middleware('permission:subprocess.edit');

    Route::post('/auditoria/{id}', 'auditoriaController@update')->name('update.auditoria');

    Route::get('/subprocess/{subprocess}', 'SubProcessController@show')->name('subprocess.show')->middleware('permission:subprocess.show');

    Route::delete('/subprocess/{subprocess}', 'SubProcessController@destroy')->name('subprocess.destroy')->middleware('permission:subprocess.destroy');

    Route::get('/subprocess/{subprocess}/edit', 'SubProcessController@edit')->name('subprocess.edit')->middleware('permission:subprocess.edit');

    //Proveederoes

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('providers', 'ProviderController')->names('admin.providers')->parameters(['providers' => 'provider']);
    });

    Route::post('/providers/store', 'ProviderController@store')->name('admin.providers.store')->middleware('permission:admin.providers.create');

    Route::get('/providers', 'ProviderController@index')->name('admin.providers.index')->middleware('permission:admin.providers.index');

    Route::get('/providers/create', 'ProviderController@create')->name('admin.providers.create')->middleware('permission:admin.providers.create');

    Route::put('/providers/{provider}', 'ProviderController@update')->name('admin.providers.update')->middleware('permission:admin.providers.edit');

    Route::get('/providers/{provider}', 'ProviderController@show')->name('admin.providers.show')->middleware('permission:admin.providers.show');

    Route::delete('/providers/{provider}', 'ProviderController@destroy')->name('admin.providers.destroy')->middleware('permission:admin.providers.destroy');

    Route::get('/providers/{provider}/edit', 'ProviderController@edit')->name('admin.providers.edit')->middleware('permission:admin.providers.edit');

    //Fruta
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('fruits', 'FruitController')->names('admin.fruits')->parameters(['fruits' => 'fruit']);
    });

    Route::post('/fruits/store', 'FruitController@store')->name('admin.fruits.store')->middleware('permission:admin.fruits.create');

    Route::get('/fruits', 'FruitController@index')->name('admin.fruits.index')->middleware('permission:admin.fruits.index');

    Route::get('/fruits/create', 'FruitController@create')->name('admin.fruits.create')->middleware('permission:admin.fruits.create');

    Route::put('/fruits/{fruit}', 'FruitController@update')->name('admin.fruits.update')->middleware('permission:admin.fruits.edit');

    Route::get('/fruits/{fruit}', 'FruitController@show')->name('admin.fruits.show')->middleware('permission:admin.fruits.show');

    Route::delete('/fruits/{fruit}', 'FruitController@destroy')->name('admin.fruits.destroy')->middleware('permission:admin.fruits.destroy');

    Route::get('/fruits/{fruit}/edit', 'FruitController@edit')->name('admin.fruits.edit')->middleware('permission:admin.fruits.edit');

    //Variead de fruta

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('varieties', 'VarietyController')->names('admin.varieties')->parameters(['varieties' => 'variety']);
    });

    Route::post('/varieties/store', 'VarietyController@store')->name('admin.varieties.store')->middleware('permission:admin.varieties.create');

    Route::get('/varieties', 'VarietyController@index')->name('admin.varieties.index')->middleware('permission:admin.varieties.index');

    Route::get('/varieties/create', 'VarietyController@create')->name('admin.varieties.create')->middleware('permission:admin.varieties.create');

    Route::put('/varieties/{variety}', 'VarietyController@update')->name('admin.varieties.update')->middleware('permission:admin.varieties.edit');

    Route::get('/varieties/{variety}', 'VarietyController@show')->name('admin.varieties.show')->middleware('permission:admin.varieties.show');

    Route::delete('/varieties/{variety}', 'VarietyController@destroy')->name('admin.varieties.destroy')->middleware('permission:admin.varieties.destroy');

    Route::get('/varieties/{variety}/edit', 'VarietyController@edit')->name('admin.varieties.edit')->middleware('permission:admin.varieties.edit');

    //Formato

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('formats', 'FormatController')->names('admin.formats')->parameters(['formats' => 'format']);
    });

    Route::post('/formats/store', 'FormatController@store')->name('admin.formats.store')->middleware('permission:admin.formats.create');

    Route::get('/formats', 'FormatController@index')->name('admin.formats.index')->middleware('permission:admin.formats.index');

    Route::get('/formats/create', 'FormatController@create')->name('admin.formats.create')->middleware('permission:admin.formats.create');

    Route::put('/formats/{format}', 'FormatController@update')->name('admin.formats.update')->middleware('permission:admin.formats.edit');

    Route::get('/formats/{format}', 'FormatController@show')->name('admin.formats.show')->middleware('permission:admin.formats.show');

    Route::delete('/formats/{format}', 'FormatController@destroy')->name('admin.formats.destroy')->middleware('permission:admin.formats.destroy');

    Route::get('/formats/{format}/edit', 'FormatController@edit')->name('admin.formats.edit')->middleware('permission:admin.formats.edit');

    //Quality

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('quality', 'QualityController')->names('admin.quality')->parameters(['quality' => 'quality']);
    });

    Route::post('/quality/store', 'QualityController@store')->name('admin.quality.store')->middleware('permission:admin.quality.create');

    Route::get('/quality', 'QualityController@index')->name('admin.quality.index')->middleware('permission:admin.quality.index');

    Route::get('/quality/create', 'QualityController@create')->name('admin.quality.create')->middleware('permission:admin.quality.create');

    Route::put('/quality/{quality}', 'QualityController@update')->name('admin.quality.update')->middleware('permission:admin.quality.edit');

    Route::get('/quality/{quality}', 'QualityController@show')->name('admin.quality.show')->middleware('permission:admin.quality.show');

    Route::delete('/quality/{quality}', 'QualityController@destroy')->name('admin.quality.destroy')->middleware('permission:admin.quality.destroy');

    Route::get('/quality/{quality}/edit', 'QualityController@edit')->name('admin.quality.edit')->middleware('permission:admin.quality.edit');

    //Exportadores

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('exporters', 'ExporterController')->names('admin.exporters')->parameters(['exporters' => 'exporter']);
    });

    Route::post('/exporters/store', 'ExporterController@store')->name('admin.exporters.store')->middleware('permission:admin.exporters.create');

    Route::get('/exporters', 'ExporterController@index')->name('admin.exporters.index')->middleware('permission:admin.exporters.index');

    Route::get('/exporters/create', 'ExporterController@create')->name('admin.exporters.create')->middleware('permission:admin.exporters.create');

    Route::put('/exporters/{exporter}', 'ExporterController@update')->name('admin.exporters.update')->middleware('permission:admin.exporters.edit');

    Route::get('/exporters/{exporter}', 'ExporterController@show')->name('admin.exporter.show')->middleware('permission:admin.exporter.show');

    Route::delete('/exporter/{exporter}', 'ExporterController@destroy')->name('admin.exporters.destroy')->middleware('permission:admin.exporters.destroy');

    Route::get('/exporters/{exporter}/edit', 'ExporterController@edit')->name('admin.exporters.edit')->middleware('permission:admin.exporters.edit');

    //Season
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('seasons', 'SeasonController')->names('admin.seasons')->parameters(['seasons' => 'season']);
    });

    Route::post('/seasons/store', 'SeasonController@store')->name('admin.seasons.store')->middleware('permission:admin.seasons.create');

    Route::get('/seasons', 'SeasonController@index')->name('admin.seasons.index')->middleware('permission:admin.seasons.index');

    Route::get('/seasons/create', 'SeasonController@create')->name('admin.seasons.create')->middleware('permission:admin.seasons.create');

    Route::put('/seasons/{season}', 'SeasonController@update')->name('admin.seasons.update')->middleware('permission:admin.seasons.edit');

    Route::get('/seasons/{season}', 'SeasonController@show')->name('admin.season.show')->middleware('permission:admin.season.show');

    Route::delete('/season/{season}', 'SeasonController@destroy')->name('admin.seasons.destroy')->middleware('permission:admin.seasons.destroy');

    Route::get('/seasons/{season}/edit', 'SeasonController@edit')->name('admin.seasons.edit')->middleware('permission:admin.seasons.edit');

    //TipoTransportes
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('tipotransportes', 'TipoTransporteController')->names('admin.tipotransportes')->parameters(['tipotransportes' => 'tipotransporte']);
    });

    Route::post('/tipotransportes/store', 'TipoTransporteController@store')->name('admin.tipotransportes.store')->middleware('permission:admin.tipotransportes.create');

    Route::get('/tipotransportes', 'TipoTransporteController@index')->name('admin.tipotransportes.index')->middleware('permission:admin.tipotransportes.index');

    Route::get('/tipotransportes/create', 'TipoTransporteController@create')->name('admin.tipotransportes.create')->middleware('permission:admin.tipotransportes.create');

    Route::put('/tipotransportes/{tipotransporte}', 'TipoTransporteController@update')->name('admin.tipotransportes.update')->middleware('permission:admin.tipotransportes.edit');

    Route::get('/tipotransportes/{tipotransporte}', 'TipoTransporteController@show')->name('admin.tipotransportes.show')->middleware('permission:admin.tipotransportes.show');

    Route::delete('/tipotransporte/{tipotransporte}', 'TipoTransporteController@destroy')->name('admin.tipotransportes.destroy')->middleware('permission:admin.tipotransportes.destroy');

    Route::get('/tipotransportes/{tipotransporte}/edit', 'TipoTransporteController@edit')->name('admin.tipotransportes.edit')->middleware('permission:admin.tipotransportes.edit');

    //Tipo de producto para despachos

    Route::post('/tipoproductodispatches/store', 'TipoProductoDispatchController@store')->name('admin.tipoproductodispatches.store')->middleware('permission:admin.tipoproductodispatches.create');

    Route::get('/tipoproductodispatches', 'TipoProductoDispatchController@index')->name('admin.tipoproductodispatches.index')->middleware('permission:admin.tipoproductodispatches.index');

    Route::get('/tipoproductodispatches/create', 'TipoProductoDispatchController@create')->name('admin.tipoproductodispatches.create')->middleware('permission:admin.tipoproductodispatches.create');

    Route::put('/tipoproductodispatches/{tipoproductodispatch}', 'TipoProductoDispatchController@update')->name('admin.tipoproductodispatches.update')->middleware('permission:admin.tipoproductodispatches.edit');

    Route::get('/tipoproductodispatches/{tipoproductodispatch}', 'TipoProductoDispatchController@show')->name('admin.tipoproductodispatches.show')->middleware('permission:admin.tipoproductodispatches.show');

    Route::delete('/tipoproductodispatch/{tipoproductodispatch}', 'TipoProductoDispatchController@destroy')->name('admin.tipoproductodispatches.destroy')->middleware('permission:admin.tipoproductodispatches.destroy');

    Route::get('/tipoproductodispatches/{tipoproductodispatch}/edit', 'TipoProductoDispatchController@edit')->name('admin.tipoproductodispatches.edit')->middleware('permission:admin.tipoproductodispatches.edit');

    //Despachos

    Route::post('/dispatch/store', 'DispatchController@store')->name('dispatch.store')->middleware('permission:dispatch.create');

    Route::get('/dispatch', 'DispatchController@index')->name('dispatch.index')->middleware('permission:dispatch.index');

    Route::get('/dispatch/create', 'DispatchController@create')->name('dispatch.create')->middleware('permission:dispatch.create');

    Route::put('/dispatch/{dispatch}', 'DispatchController@update')->name('dispatch.update')->middleware('permission:dispatch.edit');

    Route::get('/dispatch/{dispatch}', 'DispatchController@show')->name('dispatch.show')->middleware('permission:dispatch.show');

    Route::delete('/dispatch/{dispatch}', 'Dispatchcontroller@destroy')->name('dispatch.destroy')->middleware('permission:dispatch.destroy');

    Route::get('/dispatch/{dispatch}/edit', 'Dispatchcontroller@edit')->name('dispatch.edit')->middleware('permission:dispatch.edit');

    Route::get('/camara', 'Dispatchcontroller@getSubprocess')->name('dispatch.getProcess')->middleware('permission:dispatch.index');
    Route::get('dispatch-list', 'DispatchController@getData');

    //TipoDespacho

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('tipodispatches', 'TipoDispatchController')->names('admin.tipodispatches')->parameters(['tipodispatches' => 'tipodispatch']);
    });

    Route::post('/tipodispatches/store', 'TipoDispatchController@store')->name('admin.tipodispatches.store')->middleware('permission:admin.tipodispatches.create');

    Route::get('/tipodispatches', 'TipoDispatchController@index')->name('admin.tipodispatches.index')->middleware('permission:admin.tipodispatches.index');

    Route::get('/tipodispatches/create', 'TipoDispatchController@create')->name('admin.tipodispatches.create')->middleware('permission:admin.tipodispatches.create');

    Route::put('/tipodispatches/{tipodispatch}', 'TipoDispatchController@update')->name('admin.tipodispatches.update')->middleware('permission:admin.tipodispatches.edit');

    Route::get('/tipodispatches/{tipodispatch}', 'TipoDispatchContr oller@show')->name('admin.tipodispatch.show')->middleware('permission:admin.tipodispatch.show');

    Route::delete('/tipodispatch/{tipodispatch}', 'TipoDispatchController@destroy')->name('admin.tipodispatches.destroy')->middleware('permission:admin.tipodispatches.destroy');

    Route::get('/tipodispatches/{tipodispatch}/edit', 'TipoDispatchController@edit')->name('admin.tipodispatches.edit')->middleware('permission:admin.tipodispatches.edit');

    //Estatus

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('statuses', 'StatusController')->names('admin.statuses')->parameters(['statuses' => 'status']);
    });

    Route::post('/statuses/store', 'StatusController@store')->name('admin.statuses.store')->middleware('permission:admin.statuses.create');

    Route::get('/statuses', 'StatusController@index')->name('admin.statuses.index')->middleware('permission:admin.statuses.index');

    Route::get('/statuses/create', 'StatusController@create')->name('admin.statuses.create')->middleware('permission:admin.statuses.create');

    Route::put('/statuses/{status}', 'StatusController@update')->name('admin.statuses.update')->middleware('permission:admin.statuses.edit');

    Route::get('/statuses/{status}', 'StatusController@show')->name('admin.statuses.show')->middleware('permission:admin.statuses.show');

    Route::delete('/statuses/{status}', 'StatusController@destroy')->name('admin.statuses.destroy')->middleware('permission:admin.statuses.destroy');

    Route::get('/statuses/{status}/edit', 'StatusController@edit')->name('admin.statuses.edit')->middleware('permission:admin.statuses.edit');

    //TrayINNNNNNNNsssssssssssssssssssssssssssssssssssss STORE

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('trays', 'TrayInController')->names('admin.trays')->parameters(['trays' => 'tray']);
    });

    Route::post('/trays/store', 'TrayInController@store')->name('admin.trays.store')->middleware('permission:admin.trays.create');

    Route::get('/trays', 'TrayInController@index')->name('admin.trays.index')->middleware('permission:admin.trays.index');

    Route::get('/trays/create', 'TrayInController@create')->name('admin.trays.create')->middleware('permission:admin.trays.create');

    Route::put('/trays/{tray}', 'TrayInController@update')->name('admin.trays.update')->middleware('permission:admin.trays.edit');

    Route::get('/trays/{tray}', 'TrayInController@show')->name('admin.trays.show')->middleware('permission:admin.trays.show');

    Route::delete('/trays/{tray}', 'TrayInController@destroy')->name('admin.trays.destroy')->middleware('permission:admin.trays.destroy');

    Route::get('/trays/{tray}/edit', 'TrayInController@edit')->name('admin.trays.edit')->middleware('permission:admin.trays.edit');
});
