<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('items', ItemController::class)
->middleware(['auth', 'verified']);
Route::resource('customers', CustomerController::class)
->middleware(['auth', 'verified']);
Route::resource('purchases', PurchaseController::class)
->middleware(['auth', 'verified']);
Route::resource('posts', PostController::class)
->middleware(['auth', 'verified']);

Route::get('analysis', [AnalysisController::class, 'index'])->name('analysis');
Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
    }
);

Route::get('/component-test', function () {
    return Inertia::render('ComponentTest');
    }
);

Route::get('/users/index', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('users.update');

Route::get('/contacts/index', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks');
Route::post('/contacts', [ContactController::class, 'store'])->middleware(['auth', 'verified'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->middleware(['auth', 'verified'])->name('contacts.show');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->middleware(['auth', 'verified'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->middleware(['auth', 'verified'])->name('contacts.update');

Route::get('/inertia/index', [InertiaTestController::class, 'index'])->name('inertia.index');
Route::get('/inertia/create', [InertiaTestController::class, 'create'])->name('inertia.create');
Route::post('/inertia', [InertiaTestController::class, 'store'])->name('inertia.store');
Route::get('/inertia/show/{id}', [InertiaTestController::class, 'show'])->name('inertia.show');
Route::delete('/inertia/{id}', [InertiaTestController::class, 'delete'])->name('inertia.delete');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
