<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SMSController;

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
    return redirect()->route('contacts');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('contacts')->group(function () {

        Route::get('/', [ContactController::class, 'index'])->name('contacts');
        // Route for displaying the contact creation form
        Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');

        // Route for storing a new contact
        Route::post('/', [ContactController::class, 'store'])->name('contacts.store');

        // Route for displaying a specific contact
        Route::get('/{contact}', [ContactController::class, 'show'])->name('contacts.show');

        // Route for displaying the contact editing form
        Route::get('/edit/{contact}', [ContactController::class, 'edit'])->name('contacts.edit');

        // Route for updating an existing contact
        Route::post('update/{contact}', [ContactController::class, 'update'])->name('contacts.update');

        // Route for deleting a contact
        Route::get('destroy/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});


Route::get('upazila-list/{district}', [AjaxController::class, 'upazilaList'])->name('upazila-list');

Route::get('union-list/{upazila}', [AjaxController::class, 'unionList'])->name('union-list');

Route::post('send-sms', [SMSController::class, 'sendSMS'])->name('send-sms');