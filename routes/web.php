<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});


Route::get('/auth', function () {
    return view('layouts.auth');
});

// Route::get('/payment', function () {
//     return view('payment');
// });

// Route::get('/serial', function () {
//     return view('applicant.serial');
// })->name('serial');

// Route::get('/paystack', function () {
//     return view('paystack-js');
// });



Auth::routes();

//Normal User routes
Route::get('/verify', 'VerifyTransactionController@verify')->name('verify')->middleware('auth');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('user.home');

    Route::get('/payment', function () {
        return view('applicant.pay');
    })->name('payment');
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    Route::get('/form', 'FormController@view')->name('form');
    Route::post('/forms', 'FormController@create')->name('form.store');
    Route::get('/applicant/{id}', 'FormController@edit')->name('form.edit');
    Route::post('update/{id}', 'FormController@update')->name('form.update');
    Route::get('show', 'FormController@showApplicantForm')->name('application.show');
    Route::get('/showProgrammes', ['as' => 'showProgrammes', 'uses' => 'FormController@showProgramme']);

    Route::post('/accessForm', 'VerifyTransactionController@verifyReference')->name('access.form');
    
});


//Admin User routes
Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::get('/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('/admin-register', function () {
        return view('auth.admin-register');
    })->name('admin.register');
    Route::post('/admin-register/create', 'Auth\AdminRegisterController@create')->name('admin.register.store');

    Route::get('/department', 'DepartmentController@index')->name('department.index');
    Route::post('/addDepartment', 'DepartmentController@store')->name('department.store');
    Route::get('/showDepartments', 'DepartmentController@showDepartmentInformation')->name('department.list');
    Route::get('/department/edit', 'DepartmentController@editDept')->name('department.edit');
    Route::post('/department/update', 'DepartmentController@updateDept')->name('department.update');

    Route::get('/programme', 'ProgrammeController@index')->name('programme.index');
    Route::post('/addProgramme', 'ProgrammeController@store')->name('programme.store');
    Route::get('/showProgrammes', 'ProgrammeController@showProgrammeInformation')->name('programme.list');
    Route::get('/programme/edit', 'ProgrammeController@editProg')->name('programme.edit');
    Route::post('/programme/update', 'ProgrammeController@updateProg')->name('programme.update');

    Route::get('/applications', 'ReviewFormController@index')->name('admin.applications.show');
    Route::get('/applications/view/{id}', 'ReviewFormController@create')->name('admin.applications.view');
    Route::post('/applications/status/{id}', 'ReviewFormController@status')->name('admin.applications.store');
    Route::get('/status/change', 'ReviewFormController@applicationStatus')->name('status.change');
    Route::get('/status/edit/{id}', 'ReviewFormController@edit')->name('status.edit');
    Route::post('/status/update/{id}', 'ReviewFormController@update')->name('status.update');

});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/test', 'testController@index')->name('test');
// Route::post('/create', 'testController@create')->name('create');


