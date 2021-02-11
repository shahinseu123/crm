<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Client ID: 1
// Client secret: NuSINIaBsqQcjKgqtO6CIYBWSvXYgqATSdyelb1y
// Password grant client created successfully.
// Client ID: 2
// Client secret: pq7qOeKUNeOcP4pNPZDm8sTYUNq7hlEcpJKgo6f1

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['leads' => 'API\LeadsController']);
Route::apiResources(['clients' => 'API\ClientController']);
Route::apiResources(['roundone' => 'API\RoundOneController']);
Route::apiResources(['roundtwo' => 'API\RoundTwoController']);
Route::apiResources(['roundthree' => 'API\RoundThreeController']);
Route::apiResources(['access' => 'API\AccessController']);
Route::apiResources(['activity' => 'API\ActivityController']);
Route::get('makeactive/{id}', 'API\LeadsController@make_active');
Route::get('makeactivitydone/{id}', 'API\ActivityController@make_activity_done');
Route::get('makeinactive/{id}', 'API\LeadsController@make_inactive');
Route::get('makeclient/{id}', 'API\LeadsController@make_client');
Route::get('makelead/{id}', 'API\ClientController@make_lead');
// Route::get('makeronenotdone/{id}', 'API\ClientController@make_r_one_not_done');
Route::get('makeronenotdone/{id}', 'API\ClientController@make_r_one_not_done');
Route::get('makeroneworking/{id}', 'API\ClientController@make_r_one_working');
Route::get('makeronedone/{id}', 'API\ClientController@make_r_one_done');
Route::get('makertwonotdone/{id}', 'API\ClientController@make_r_two_not_done');
Route::get('makertwodone/{id}', 'API\ClientController@make_r_two_done');
Route::get('makertwoworking/{id}', 'API\ClientController@make_r_two_working');
Route::get('makerthreenotdone/{id}', 'API\ClientController@make_r_three_not_done');
Route::get('makerthreedone/{id}', 'API\ClientController@make_r_three_done');
Route::get('makerthreeworking/{id}', 'API\ClientController@make_r_three_working');
Route::get('send-to-activity/{id}', 'API\LeadsController@make_activity');
Route::get('sendActivityToLead/{id}', 'API\LeadsController@make_activity_to_lead');
Route::get('getauthuser', 'API\UserController@get_auth_user');
