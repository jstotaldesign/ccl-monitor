<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Responsibility
    Route::apiResource('responsibilities', 'ResponsibilityApiController');

    // Status Type
    Route::apiResource('status-types', 'StatusTypeApiController');

    // Issues
    Route::post('issues/media', 'IssuesApiController@storeMedia')->name('issues.storeMedia');
    Route::apiResource('issues', 'IssuesApiController');

    // Department
    Route::apiResource('departments', 'DepartmentApiController');

    // Detail Of Subject
    Route::post('detail-of-subjects/media', 'DetailOfSubjectApiController@storeMedia')->name('detail-of-subjects.storeMedia');
    Route::apiResource('detail-of-subjects', 'DetailOfSubjectApiController');
});
