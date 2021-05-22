<?php

Route::get('message/list', [
    'as' => 'listMessage',
    'uses' => 'MessageController@listMessage'
]);


Route::get('message/delete/{id}',[
    'as'=>'deleteMessage',
    'uses'=> 'MessageController@deleteMessage'
]);

Route::get('message/status/{id}',[
    'as'=>'statusMessage',
    'uses'=> 'MessageController@statusMessage'
]);
