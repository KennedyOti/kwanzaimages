<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageBranchController;
use App\Http\Controllers\TeamsController;   // Import TeamsController
use App\Http\Controllers\BlogController;       // Import BlogController
use App\Http\Controllers\GalleryController; // Import GalleryController
use App\Http\Controllers\ServicesController; // Import ServicesController
use App\Http\Controllers\ManageBlogController; // Import ManageBlogController

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog Routes for displaying public blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // List all blogs
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show'); // Show single blog by slug
Route::post('/blog/{id}/like', [BlogController::class, 'like'])->name('blog.like');
// Define the store comment route
Route::post('/blog/{blog}/comment', [BlogController::class, 'storeComment'])->name('blog.comment.store');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('user.index');
    




    // Manage Blogs Routes (for admins)
    Route::get('/manageblogs', [ManageBlogController::class, 'index'])->name('manageblog.index'); // List blogs for management
    Route::get('/manageblog/create', [ManageBlogController::class, 'create'])->name('manageblog.create'); // Show create form
    Route::post('/manageblog', [ManageBlogController::class, 'store'])->name('manageblog.store'); // Store new blog
    Route::get('/manageblog/{id}/edit', [ManageBlogController::class, 'edit'])->name('manageblog.edit'); // Show edit form
    Route::put('/manageblog/{id}', [ManageBlogController::class, 'update'])->name('manageblog.update'); // Update existing blog
    Route::delete('/manageblog/{id}', [ManageBlogController::class, 'destroy'])->name('manageblog.destroy'); // Delete blog

    // Gallery Routes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Services Routes
    Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
    Route::post('/services', [ServicesController::class, 'store'])->name('services.store');
    Route::put('/services/{id}', [ServicesController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');

    // Teams Routes
    Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
    Route::post('/teams', [TeamsController::class, 'store'])->name('teams.store');
    Route::put('/teams/{id}', [TeamsController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamsController::class, 'destroy'])->name('teams.destroy');

    // Branch Routes
    Route::get('/branches', [ManageBranchController::class, 'index'])->name('branches.index');
    Route::post('/branches', [ManageBranchController::class, 'store'])->name('branches.store');
    Route::put('/branches/{id}', [ManageBranchController::class, 'update'])->name('branches.update');
    Route::delete('/branches/{id}', [ManageBranchController::class, 'destroy'])->name('branches.destroy');

    // Sales Routes
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');

    require_once 'profile.php';
});

// Include Authentication Routes
require __DIR__ . '/auth.php';
