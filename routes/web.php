<?php

use App\Http\Webhooks\HesabeWebhook;
use App\Http\Webhooks\MyFatoorahWebhook;
use App\Http\Webhooks\TamaraWebhook;
use App\Http\Webhooks\TapWebhook;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// handle callback from hesabe payment gateway
Route::get('hesabe-webhook/response-url', HesabeWebhook::class)->name('hesabe-webhook.response-url');
Route::get('hesabe-webhook/failure-url', HesabeWebhook::class)->name('hesabe-webhook.failure-url');

// handle callback from myfatoorah payment gateway
Route::get('myfatoorah-webhook/response-url', MyFatoorahWebhook::class)->name('myfatoorah-webhook.response-url');
Route::get('myfatoorah-webhook/failure-url', MyFatoorahWebhook::class)->name('myfatoorah-webhook.failure-url');


// handle callback from tap payment gateway
Route::get('tap-webhook/response-url', TapWebhook::class)->name('tap-webhook.response-url');
Route::get('tap-webhook/failure-url', TapWebhook::class)->name('tap-webhook.failure-url');

// handle callback from tamara payment gateway
Route::post('tamara-webhook', TamaraWebhook::class)->name('tamara-webhook')->name('tamara-webhook');
