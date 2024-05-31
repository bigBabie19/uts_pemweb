<?php
Route::get('/luar_negri', 'Frontend@luar_negri')->name('frontend');
Route::get('/dalem_negri', 'Frontend@pengumuman_dalem_negri')->name('frontend');
Route::get('/', 'Frontend@home')->name('frontend');
Route::post('/', 'Frontend@store')->name('frontend.store');
//Route::redirect('/', '/login')
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

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Product
    Route::delete('dalemnegris/destroy', 'DalemnegriController@massDestroy')->name('dalemnegris.massDestroy');
    Route::post('dalemnegris/media', 'DalemnegriController@storeMedia')->name('dalemnegris.storeMedia');
    Route::post('dalemnegris/ckmedia', 'DalemnegriController@storeCKEditorImages')->name('dalemnegris.storeCKEditorImages');
    Route::resource('dalemnegris', 'DalemnegriController');

        // Product
        Route::delete('luars/destroy', 'LuarController@massDestroy')->name('luars.massDestroy');
        Route::post('luars/media', 'LuarController@storeMedia')->name('luars.storeMedia');
        Route::post('luars/ckmedia', 'LuarController@storeCKEditorImages')->name('luars.storeCKEditorImages');
        Route::resource('luars', 'LuarController');

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
