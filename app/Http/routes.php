<?php

Route::group(['middeleware' => ['api']], function () {
    Route::post('/auth/signup', [
        'uses' => 'AuthController@signup'
    ]);
});
