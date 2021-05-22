<?php

Route::get('slider/index', [
    'as' => 'listSlider',
    'uses' => 'SliderController@listSlider'
]);

Route::get('slider/add',[
    'as'=>'addSlider',
    'uses'=> 'SliderController@addSlider'
]);

Route::post('slider/add',[
    'as'=>'createSlider',
    'uses'=> 'SliderController@createSlider'
]);

Route::get('slider/edit/{id}',[
    'as'=>'editSlider',
    'uses'=> 'SliderController@editSlider'
]);

Route::post('slider/edit/{id}',[
    'as'=>'updateSlider',
    'uses'=> 'SliderController@updateSlider'
]);

Route::get('slider/delete/{id}',[
    'as'=>'deleteSlider',
    'uses'=> 'SliderController@deleteSlider'
]);

Route::post('slider/update-order',[
    'as'=>'updatedSliderOrder',
    'uses'=> 'SliderController@updatedSliderOrder'
]);
