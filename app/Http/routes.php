<?php

Route::group(['middleware' => ['api']], function () {
    Route::post('/auth/signup', [
        'uses' => 'AuthController@signup'
    ]);
    Route::post('/auth/signin', [
        'uses' => 'AuthController@signin'
    ]);

    Route::group(['middleware' => 'jwt.auth'], function () {
            Route::get('/test',function() {
                dd('You are authenticated.');
            });
        }
    );
});
