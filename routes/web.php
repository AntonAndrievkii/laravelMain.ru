<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** Admin side */
Route::group(['middleware' => ['status', 'auth']], function () {

    $groupData = [
        'namespace' => 'Blog\Admin',
        'prefix' => 'admin',
    ];

    Route::group($groupData, function () {
        Route::resource('index', 'MainController')
            ->names('blog.admin.index');



    });

});
Route::get('user/index', 'Blog\User\MainController@index');
