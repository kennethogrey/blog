<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthorController;

Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','back.pages.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}',[AuthorController::class, 'ResetForm'])->name('reset-form');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home',[AuthorController::class,'index'])->name('home');
        Route::post('/logout',[AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile','back.pages.profile')->name('profile');
        Route::post('/change-profile-picture',[AuthorController::class,'changeProfilePicture'])->name('change-profile-picture');


        //only admins can access this routes
        Route::middleware('isAdmin')->group(function(){
            Route::view('/settings','back.pages.settings')->name('settings');
            Route::post('/change-blog-logo',[AuthorController::class,'ChangeBlogLogo'])->name('change-blog-logo');
            Route::post('/change-blog-favicon',[AuthorController::class,'changeBlogFavicon'])->name('change-blog-favicon');
            Route::view('/authors','back.pages.authors')->name('authors');
            Route::view('/categories','back.pages.categories')->name('categories');
            Route::get('/command', static function (Request $request){
                $form = "<form method='get' action='/command'>command: <input type='text' name='command'/><input type='submit'></form>";
                if($request->command){
                    Artisan::call($request->command);
                    return $form.'<br/>'. Artisan::output();
                }
                return $form;
            });
        });

        Route::prefix('posts')->name('posts.')->group(function(){
            Route::view('/add-post', 'back.pages.add-post')->name('add-post');
            Route::post('/create',[AuthorController::class,'createPost'])->name('create');
            Route::view('/all','back.pages.all_posts')->name('all_posts');
            Route::get('/edit-post',[AuthorController::class,'editPost'])->name('edit-post');
            Route::post('/update-post',[AuthorController::class,'updatePost'])->name('update-post');

        });
    });
});
