<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Tracking
    Route::apiResource('trackings', 'TrackingApiController');

    // Task
    Route::apiResource('tasks', 'TaskApiController');
});
