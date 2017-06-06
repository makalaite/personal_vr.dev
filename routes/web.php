<?php

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'notAdminRestriction']], function () {
    Route::get('/', ['as' => 'app.admin.orders.index', 'uses' => 'VROrdersController@adminIndex']);

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'app.admin.users.index', 'uses' => 'VRUsersController@adminIndex']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VRUsersController@adminShow']);
            Route::get('/edit', ['as' => 'app.admin.users.edit', 'uses' => 'VRUsersController@adminEdit']);
            Route::post('/edit', ['uses' => 'VRUsersController@adminUpdate']);
            Route::delete('/', ['as' => 'app.admin.users.showDelete', 'uses' => 'VRUsersController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'upload'], function () {
        Route::get('/', ['as' => 'app.admin.resources.index', 'uses' => 'VRResourcesController@adminIndex']);
        Route::get('/create', ['uses' => 'VRResourcesController@adminCreate']);
        Route::post('/create', ['as' => 'app.admin.resources.store', 'uses' => 'VRResourcesController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VRResourcesController@adminShow']);
            Route::delete('/', ['as' => 'app.admin.resources.showDelete', 'uses' => 'VRResourcesController@adminDestroy']);
        });
    });


    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', ['as' => 'app.admin.languages.index', 'uses' => 'VRLanguagesController@adminIndex']);
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'app.admin.categories.index', 'uses' => 'VRCategoriesController@adminIndex']);
    });


    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', ['as' => 'app.admin.pages.index', 'uses' => 'VRPagesController@adminIndex']);
        Route::get('/create', ['as' => 'app.admin.pages.create', 'uses' => 'VRPagesController@adminCreate']);
        Route::post('/create', ['uses' => 'VRPagesController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VRPagesController@adminShow']);
            Route::get('/edit/{lang}', ['as' => 'app.admin.pages.edit', 'uses' => 'VRPagesController@adminEdit']);
            Route::post('/edit/{lang}', ['uses' => 'VRPagesController@adminUpdate']);
            Route::delete('/', ['as' => 'app.admin.pages.showDelete', 'uses' => 'VRPagesController@adminDestroy']);
        });

    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', ['as' => 'app.admin.orders.index', 'uses' => 'VROrdersController@adminIndex']);
        Route::get('/create', ['as' => 'app.admin.orders.create', 'uses' => 'VROrdersController@adminCreate']);
        Route::post('/create', ['uses' => 'VROrdersController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VROrdersController@adminShow']);
            Route::get('/edit', ['as' => 'app.admin.orders.edit', 'uses' => 'VROrdersController@adminEdit']);
            Route::post('/edit', ['uses' => 'VROrdersController@adminUpdate']);
            Route::delete('/', ['as' => 'app.admin.orders.showDelete', 'uses' => 'VROrdersController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', ['as' => 'app.admin.menus.index', 'uses' => 'VRMenusController@adminIndex']);
        Route::get('/create', ['as' => 'app.admin.menus.create', 'uses' => 'VRMenusController@adminCreate']);
        Route::post('/create', ['uses' => 'VRMenusController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VRMenusController@adminShow']);
            Route::get('/edit/{lang}', ['as' => 'app.admin.menus.edit', 'uses' => 'VRMenusController@adminEdit']);
            Route::post('/edit/{lang}', ['uses' => 'VRMenusController@adminUpdate']);
            Route::delete('/', ['as' => 'app.admin.menus.showDelete', 'uses' => 'VRMenusController@adminDestroy']);
        });
    });
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'notUserRestriction']], function () {
    Route::get('/', ['as' => 'app.user.orders.index', 'uses' => 'VROrdersController@index']);

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', ['as' => 'app.user.orders.index', 'uses' => 'VROrdersController@index']);
        Route::get('/create', ['as' => 'app.user.orders.create', 'uses' => 'VROrdersController@create']);
        Route::post('/create', ['uses' => 'VROrdersController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VROrdersController@adminShow']);
            Route::delete('/', ['as' => 'app.user.orders.showDelete', 'uses' => 'VROrdersController@destroy']);
        });
    });
});

Route::get('/{lang?}', ['middleware' => ['LanguageRestriction'], 'uses' => 'VRFrontEndController@displayMenu']);
