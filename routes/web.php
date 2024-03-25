<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Technicals
    Route::delete('technicals/destroy', 'TechnicalsController@massDestroy')->name('technicals.massDestroy');
    Route::resource('technicals', 'TechnicalsController');

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Contactus
    Route::delete('contactus/destroy', 'ContactusController@massDestroy')->name('contactus.massDestroy');
    Route::resource('contactus', 'ContactusController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

    // Team Works
    Route::delete('team-works/destroy', 'TeamWorksController@massDestroy')->name('team-works.massDestroy');
    Route::post('team-works/media', 'TeamWorksController@storeMedia')->name('team-works.storeMedia');
    Route::post('team-works/ckmedia', 'TeamWorksController@storeCKEditorImages')->name('team-works.storeCKEditorImages');
    Route::resource('team-works', 'TeamWorksController');

    // Request Service
    Route::delete('request-services/destroy', 'RequestServiceController@massDestroy')->name('request-services.massDestroy');
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
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
