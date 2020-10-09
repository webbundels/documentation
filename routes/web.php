<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'documentation.',
    'prefix' => 'documentatie',
    'middleware' => ['web', 'auth.basic']
], function()
{
    # Index
    Route::get('/',                     ['as' => 'index',               'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@index']);

    # Create
    Route::get('create',               ['as' => 'create',              'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@create']);
    Route::post('create',              ['as' => 'store',               'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@store']);

    # Edit
    Route::post('change-order',         ['as' => 'change_order',        'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@changeOrder']);
    Route::get('{id}',                  ['as' => 'edit',                'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@edit']);
    Route::post('{id}',                 ['as' => 'update',              'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@update']);


    Route::get('{id}/delete',           ['as' => 'delete',              'uses' => 'webbundels\documentation\Http\Controllers\DocumentationController@delete']);
});
