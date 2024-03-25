<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () { 

    Route::get('about', 'HomeController@about')->name('about');
    Route::get('clients', 'HomeController@clients')->name('clients');
    Route::get('contact', 'HomeController@contact')->name('contact'); 
    Route::get('sterilization', 'HomeController@sterilization')->name('sterilization');
    
    Route::resource('services', 'ServiceController');   
    Route::resource('contactus', 'ContactUsController');
    Route::resource('request-services', 'RequestServiceController'); 

}); 
