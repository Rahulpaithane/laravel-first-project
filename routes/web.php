<?php


Route::get('/', function () {
    return view('index');
});

Route::post('/login',"ATGController@showData");
