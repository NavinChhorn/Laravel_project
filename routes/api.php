<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchCountryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\ZoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::resource('event',EventController::class);
Route::resource('event',EventController::class);
// =============== Route search event =================================
Route::get('/searchevent/{name}',[EventController::class,'search']);



Route::resource('country',CountryController::class);
Route::resource('venue',VenueController::class);
Route::resource('zone',ZoneController::class);
Route::resource('match',MatchController::class);
Route::resource('matchcountry',MatchCountryController::class);
// ==================== ticket route =================================
Route::resource('ticket',TicketController::class);
// =============== Route booking ticket ==============================
Route::get('/booking/{eventname}',[TicketController::class,'booking']);


