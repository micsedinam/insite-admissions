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

Route::get('/serial', function () {
    return view('applicant.serial');
})->name('serial');

Route::post('/create', 'testController@create')->name('create');

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
    
    Route::get('/courses', 'CoursesController@index')->name('courses.index');
    Route::post('/addCourses', 'CoursesController@import')->name('courses.import');
    Route::get('/showCourses', 'CoursesController@showCourseInformation')->name('courses.list');
    //Route::get('/department/edit', 'DepartmentController@editDept')->name('department.edit');
    //Route::post('/department/update', 'DepartmentController@updateDept')->name('department.update');

    Route::get('/programme', 'ProgrammeController@index')->name('programme.index');
    Route::post('/addProgramme', 'ProgrammeController@store')->name('programme.store');
    Route::get('/showProgrammes', 'ProgrammeController@showProgrammeInformation')->name('programme.list');
    Route::get('/programme/edit', 'ProgrammeController@editProg')->name('programme.edit');
    Route::post('/programme/update', 'ProgrammeController@updateProg')->name('programme.update');
    
    Route::get('/reviewed/applications', 'ReviewFormController@reviewed')->name('admin.applications.reviewed');
    Route::get('/reviewed/application/{id}', 'ReviewFormController@showReviewed')->name('admin.applications.show.reviewed');

    Route::get('/applications', 'ReviewFormController@index')->name('admin.applications.show');
    Route::get('/applications/view/{id}', 'ReviewFormController@create')->name('admin.applications.view');
    Route::post('/applications/status/{id}', 'ReviewFormController@status')->name('admin.applications.store');

    Route::get('/status/change', 'ReviewFormController@applicationStatus')->name('status.change');
    Route::get('/status/edit/{id}', 'ReviewFormController@edit')->name('status.edit');
    Route::post('/status/update/{id}', 'ReviewFormController@update')->name('status.update');

    Route::get('/generate/code', 'FeePaymentController@index')->name('code.index');
    Route::post('/addCode', 'FeePaymentController@store')->name('code.store');
    Route::get('/showCode', 'FeePaymentController@showCodeInformation')->name('code.list');
    //Route::get('/department/edit', 'DepartmentController@editDept')->name('department.edit');
    //Route::post('/department/update', 'DepartmentController@updateDept')->name('department.update');

    Route::get('/course/list', 'CourseRegistrationController@studentCourseList')->name('course.list');
    Route::post('/course/list', 'CourseRegistrationController@retrieveCourseList')->name('retrieve.course.list');

    Route::get('/results', 'ResultController@index')->name('results.index');
    Route::post('/add/results', 'ResultController@importResult')->name('results.import');
    Route::get('/list/results', 'ResultController@showResultInformation')->name('results.list');
    Route::get('/generate/transcript', function() { return view('admin.transcripts.generate'); })->name('transcript.index');
    Route::post('/get/transcript', 'ResultController@getTranscript')->name('get.transcript');
    
    
    Route::get('/student/results', 'StudentResultController@index')->name('student.results.index');
    Route::get('/student/profiles', 'StudentResultController@showIndexNumbers')->name('show.index.numbers');
    Route::post('/student/results/add', 'StudentResultController@createStudentResult')->name('student.results.add');
    Route::get('/student/results/show', 'StudentResultController@showStudentResultInformation')->name('student.results.show');
    Route::get('/student/results/edit', 'StudentResultController@editStudentResult')->name('student.results.edit');
    Route::post('/student/results/update', 'StudentResultController@updateStudentResult')->name('student.results.update');

    Route::get('/cassessment', 'CAController@index')->name('ca.index');
    Route::post('/addAssessment', 'CAController@store')->name('ca.store');
    Route::get('/showAssessment', 'CAController@showCAInformation')->name('ca.list');
    Route::get('/assessment/edit', 'CAController@editCA')->name('ca.edit');
    Route::post('/assessment/update', 'CAController@updateCA')->name('ca.update');
    Route::post('/import/assessment', 'CAController@importAssessment')->name('ca.import');


});

//Continuing Student
Route::group(['prefix' => 'student', 'middleware' => 'is_admin'], function () {
    Route::get('/home', 'HomeController@studentHome')->name('student.home');

    Route::get('/profile', 'ProfileController@index')->name('student.profile');
    Route::get('/edit/profile', 'ProfileController@edit')->name('student.edit.profile');
    Route::get('/programmes', 'ProfileController@showProgramme')->name('student.programme');
    Route::post('/profile/update', 'ProfileController@store')->name('student.profile.update');
    Route::post('/profile/edit/update', 'ProfileController@update')->name('student.profile.edit.update');

    Route::post('/access/course/registration', 'FeePaymentController@verifyFeeCode')->name('access.courses');

    Route::get('/register/courses', 'CourseRegistrationController@index')->name('register.courses');
    Route::get('/view/course/list', 'CourseRegistrationController@getCourses')->name('course.list');
    Route::get('/export/courses', 'CourseRegistrationController@Export')->name('export.courses');
    Route::post('/register/courses', 'CourseRegistrationController@Store')->name('register.courses');
    Route::get('/registered', 'CourseRegistrationController@Registered')->name('registered');

    Route::get('/results', 'MyResultsController@index')->name('results.index');
    Route::post('/results/check', 'MyResultsController@check')->name('results.check');
    Route::get('/results/view', 'MyResultsController@check')->name('results.view');

});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/test', 'testController@index')->name('test');
// Route::post('/create', 'testController@create')->name('create');


