<?php

Route::get('/', 'HomeController@index');


Route::group(['prefix' => '/api/rest'], function(){
    Route::get('/buscarConta/{conta}', 'ContaCorrentController@buscarConta');
    Route::put('/depositar/{id}', 'ContaCorrentController@depositar');
    Route::put('/sacar/{id}', 'ContaCorrentController@sacar');
}); 