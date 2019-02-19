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


Route::group(['middleware' => ['guest']], function(){

    Route::get('/register', [
        'as' => 'show-register',
        'uses'=>'RegisterController@create'
        ]);

    Route::post('/register', 'RegisterController@store')
        ->name('register')
        ->middleware('age');

    Route::get('/login','LoginController@create')->name('show-login');

    Route::post('/login','LoginController@store')->name('login');

    Route::get('logout','LoginController@logout')->name('logout');

});

Route::group(
    ['middleware' => ['auth'] ],
    function() {
        Route::get('/my-posts','UserPostsController@index')
        ->name('my-posts');
    }
);


Route::delete('/posts/{id}', 'PostController@destroy')
    ->name('posts-destroy');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('posts', function(){
//     return view('posts.index');
// });


// Route::get('posts/{id}', function(){
//     return view('posts.show');
// });

Route::resource('posts', 'PostController');

// Route::get('posts/create', 'PostController@create'); 

// Route::get('posts', 'PostController@index');
// Route::get('posts/id', 'PostController@show');

Route::post('posts/{id}/comments','PostController@addComment' )->name('posts.comment');

// Rout::get('/register', 'RegisterController@create')->name()



