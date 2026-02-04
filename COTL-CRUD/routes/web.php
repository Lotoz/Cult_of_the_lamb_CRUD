<?php

/**
 * Web Application Routes
 *
 * Route definition file for the Cult of the Lamb CRUD application.
 * Includes public, authenticated, and protected routes for:
 * - Home page and dashboard
 * - User profile management
 * - Complete CRUD for followers
 */

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowerController;

// Public route: home page
Route::get('/', function () {
    return view('welcome');
});

// Protected routes (authenticated and verified only)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Followers management routes
    /**
     * Resource routes for followers.
     * Automatically generates these RESTful routes:
     * - GET    /followers              (index)   - list of followers
     * - GET    /followers/create       (create)  - creation form
     * - POST   /followers              (store)   - save new follower
     * - GET    /followers/{id}         (show)    - view follower details
     * - GET    /followers/{id}/edit    (edit)    - edit form
     * - PUT    /followers/{id}         (update)  - update follower
     * - DELETE /followers/{id}         (destroy) - delete follower
     */
    Route::resource('followers', FollowerController::class);
});

// User profile management routes (authenticated only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
