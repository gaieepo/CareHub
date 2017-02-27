<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('patient/generateTasks/{id}/{complexity}', ['as' => 'generateTasks', 'uses' => 'PatientController@generateTasks']);
Route::resource('patient', 'PatientController');
Route::resource('task', 'TaskController');

Route::get('calendar', 'CalendarController@index');

Route::get('user/{id}', 'UserController@show');

Route::group(['middleware' => 'auth', 'prefix' => 'messages'], function() {
	Route::get('/', ['as' => 'messages', 'uses' => 'MessageController@index']);
	Route::get('create', ['as' => 'messages.create', 'uses' => 'MessageController@create']);
	Route::post('/', ['as' => 'messages.store', 'uses' => 'MessageController@store']);
	Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessageController@show']);
	Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessageController@update']);
});


Route::get('patient_summary', function () {
        return view('static_forms/patient_summary/patientsummary');
});
Route::get('patient_profile', function () {
        return view('static_forms/patient_profile/patientfile');
    });
Route::get('call_log', function () {
        return view('static_forms/call_log/call_log');
    });

Route::resource('protocol', 'ProtocolController@index');
Route::resource('protocol_show/{id}', 'ProtocolController@show');

Route::get('adherence', function () {
        return view('static_forms/adherence/adherence');
    });
