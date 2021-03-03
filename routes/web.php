<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('/student', function () {
//     return view('student.index');
// });

Route::group(['namespace' => 'App\Http\controllers'], function(){
   Route::resource('student', 'StudentController');
   Route::post('student-store', 'StudentController@store');
   Route::get('all-students', 'StudentController@allStudents');
   Route::get('edit_students/{id}', 'StudentController@edit');
   Route::post('update_students', 'StudentController@update');
   Route::get('delete_student/{id}', 'StudentController@deleteStudent');

});
