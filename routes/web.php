<?php

Route::get('link', function(){
    Artisan::call('storage:link'); 
});

Route::prefix('/')->group(function () {
    Route::get('/', 'WebsiteController@index');
    Route::get('sobre-nos', 'WebsiteController@aboutUs');
    Route::get('servicos', 'WebsiteController@services');
    Route::get('services/{url}', 'WebsiteController@service');
    Route::get('peca-nos-uma-cotacao', 'WebsiteController@quotation');
    Route::get('contactos', 'WebsiteController@contacts');
});

Route::prefix('forms')->group(function () {
    Route::post('quotation', 'FormsController@quotation');
    Route::post('contact', 'FormsController@contact');
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
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

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

    // Service
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServiceController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServiceController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServiceController');

    // Quotation
    Route::delete('quotations/destroy', 'QuotationController@massDestroy')->name('quotations.massDestroy');
    Route::resource('quotations', 'QuotationController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Slide
    Route::delete('slides/destroy', 'SlideController@massDestroy')->name('slides.massDestroy');
    Route::post('slides/media', 'SlideController@storeMedia')->name('slides.storeMedia');
    Route::post('slides/ckmedia', 'SlideController@storeCKEditorImages')->name('slides.storeCKEditorImages');
    Route::resource('slides', 'SlideController');

    // Service List
    Route::delete('service-lists/destroy', 'ServiceListController@massDestroy')->name('service-lists.massDestroy');
    Route::resource('service-lists', 'ServiceListController');

    // Feature
    Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
    Route::post('features/media', 'FeatureController@storeMedia')->name('features.storeMedia');
    Route::post('features/ckmedia', 'FeatureController@storeCKEditorImages')->name('features.storeCKEditorImages');
    Route::resource('features', 'FeatureController');

    // Inner Service
    Route::delete('inner-services/destroy', 'InnerServiceController@massDestroy')->name('inner-services.massDestroy');
    Route::post('inner-services/media', 'InnerServiceController@storeMedia')->name('inner-services.storeMedia');
    Route::post('inner-services/ckmedia', 'InnerServiceController@storeCKEditorImages')->name('inner-services.storeCKEditorImages');
    Route::resource('inner-services', 'InnerServiceController');

    // Video
    Route::delete('videos/destroy', 'VideoController@massDestroy')->name('videos.massDestroy');
    Route::resource('videos', 'VideoController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomerController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomerController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::resource('customers', 'CustomerController');
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