<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Users

Route::prefix('/user')->group( function() {
    Route::post('/login','api\LoginController@login');
    Route::post('/logout', 'api\LoginController@logout');
    Route::middleware('auth:api')->group(function () {
        Route::get('/current','api\user\UserController@currentUser');
        Route::get('/tasks', 'api\task\TasksController@index');
        Route::post('/tasks', 'api\task\TasksController@store');
        Route::patch('/tasks/{task}', 'api\task\TasksController@update');
        Route::delete('/tasks/{task}', 'api\task\TasksController@destroy');
        Route::patch('/tasksCheckAll', 'api\task\TasksController@updateAll');
        Route::delete('/tasksDestroyCompleted', 'api\task\TasksController@destroyCompleted');
    });
});
