<?php


use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'client', 'as' => 'client.', 'namespace' => 'Client', 'middleware' => ['auth','client']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    

    // Request Service
    Route::get('request-services/change_status/{status}/{id}', 'RequestServiceController@change_status')->name('request-services.change_status');
    Route::post('request-services/media', 'RequestServiceController@storeMedia')->name('request-services.storeMedia');
    Route::post('request-services/ckmedia', 'RequestServiceController@storeCKEditorImages')->name('request-services.storeCKEditorImages');
    Route::resource('request-services', 'RequestServiceController');

    // Contracts
    Route::delete('contracts/destroy', 'ContractsController@massDestroy')->name('contracts.massDestroy');
    Route::post('contracts/media', 'ContractsController@storeMedia')->name('contracts.storeMedia');
    Route::post('contracts/ckmedia', 'ContractsController@storeCKEditorImages')->name('contracts.storeCKEditorImages');
    Route::resource('contracts', 'ContractsController');

    // Appointments
    Route::delete('appointments/destroy', 'AppointmentsController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
}); 
