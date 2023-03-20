<?php

Route::redirect('/', '/login');
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

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Job Type
    Route::delete('job-types/destroy', 'JobTypeController@massDestroy')->name('job-types.massDestroy');
    Route::resource('job-types', 'JobTypeController');

    // Ctergorize Priority
    Route::delete('ctergorize-priorities/destroy', 'CtergorizePriorityController@massDestroy')->name('ctergorize-priorities.massDestroy');
    Route::resource('ctergorize-priorities', 'CtergorizePriorityController');

    // Responsibility
    Route::delete('responsibilities/destroy', 'ResponsibilityController@massDestroy')->name('responsibilities.massDestroy');
    Route::resource('responsibilities', 'ResponsibilityController');

    // Status Type
    Route::delete('status-types/destroy', 'StatusTypeController@massDestroy')->name('status-types.massDestroy');
    Route::resource('status-types', 'StatusTypeController');

    // Dynamics Nav Menu
    Route::delete('dynamics-nav-menus/destroy', 'DynamicsNavMenuController@massDestroy')->name('dynamics-nav-menus.massDestroy');
    Route::resource('dynamics-nav-menus', 'DynamicsNavMenuController');

    // Dynamics Nav Object Type
    Route::delete('dynamics-nav-object-types/destroy', 'DynamicsNavObjectTypeController@massDestroy')->name('dynamics-nav-object-types.massDestroy');
    Route::resource('dynamics-nav-object-types', 'DynamicsNavObjectTypeController');

    // Dynamics Nav Ojbect Id
    Route::delete('dynamics-nav-ojbect-ids/destroy', 'DynamicsNavOjbectIdController@massDestroy')->name('dynamics-nav-ojbect-ids.massDestroy');
    Route::resource('dynamics-nav-ojbect-ids', 'DynamicsNavOjbectIdController');

    // Issues
    Route::delete('issues/destroy', 'IssuesController@massDestroy')->name('issues.massDestroy');
    Route::post('issues/media', 'IssuesController@storeMedia')->name('issues.storeMedia');
    Route::post('issues/ckmedia', 'IssuesController@storeCKEditorImages')->name('issues.storeCKEditorImages');
    Route::resource('issues', 'IssuesController');

    // Requester
    Route::delete('requesters/destroy', 'RequesterController@massDestroy')->name('requesters.massDestroy');
    Route::resource('requesters', 'RequesterController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Detail Of Subject
    Route::delete('detail-of-subjects/destroy', 'DetailOfSubjectController@massDestroy')->name('detail-of-subjects.massDestroy');
    Route::post('detail-of-subjects/media', 'DetailOfSubjectController@storeMedia')->name('detail-of-subjects.storeMedia');
    Route::post('detail-of-subjects/ckmedia', 'DetailOfSubjectController@storeCKEditorImages')->name('detail-of-subjects.storeCKEditorImages');
    Route::resource('detail-of-subjects', 'DetailOfSubjectController');
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
