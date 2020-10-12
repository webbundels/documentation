<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'documentation.',
    'prefix' => 'documentatie',
    'middleware' => ['web', 'auth.basic']
], function()
{
    # Index
    Route::get('/',                     ['as' => 'index',               'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@index']);

    # Create
    Route::get('create',               ['as' => 'create',              'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@create']);
    Route::post('create',              ['as' => 'store',               'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@store']);

    # Edit
    Route::post('change-order',         ['as' => 'change_order',        'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@changeOrder']);
    Route::get('{id}',                  ['as' => 'edit',                'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@edit']);
    Route::post('{id}',                 ['as' => 'update',              'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@update']);


    Route::get('{id}/delete',           ['as' => 'delete',              'uses' => 'Webbundels\Documentation\Http\Controllers\DocumentationController@delete']);
});
