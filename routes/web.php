<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageBranchController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ManageBlogController;
use App\Http\Controllers\ManageBookingsController;
use App\Http\Controllers\ManageSalesController;  // Import ManageSalesController
use App\Http\Controllers\RecordSalesController;  // Import RecordSalesController

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Booking Route
Route::post('/book-session', [HomeController::class, 'bookSession'])->name('book.session');
// Blog Routes for displaying public blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // List all blogs
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show'); // Show single blog by slug
Route::post('/blog/{id}/like', [BlogController::class, 'like'])->name('blog.like');
Route::post('/blog/{blog}/comment', [BlogController::class, 'storeComment'])->name('blog.comment.store');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('user.index');

    // Manage Bookings Routes (for admins and employees)
    Route::middleware('checkrole:admin,employee')->group(function () {
        Route::get('/manage-bookings', [ManageBookingsController::class, 'index'])->name('managebookings.index'); // View all bookings
        Route::get('/manage-booking/{id}/edit', [ManageBookingsController::class, 'edit'])->name('managebookings.edit'); // Edit booking
        Route::put('/manage-booking/{id}', [ManageBookingsController::class, 'update'])->name('managebookings.update'); // Update booking
        Route::delete('/manage-booking/{id}', [ManageBookingsController::class, 'destroy'])->name('managebookings.destroy'); // Delete booking
        Route::post('/manage-booking/{id}/confirm', [ManageBookingsController::class, 'confirm'])->name('managebookings.confirm'); // Confirm booking
    });



    // Manage Blogs Routes
    Route::get('/manageblogs', [ManageBlogController::class, 'index'])->name('manageblog.index');
    Route::get('/manageblog/create', [ManageBlogController::class, 'create'])->name('manageblog.create');
    Route::post('/manageblog', [ManageBlogController::class, 'store'])->name('manageblog.store');
    Route::get('/manageblog/{id}/edit', [ManageBlogController::class, 'edit'])->name('manageblog.edit');
    Route::put('/manageblog/{id}', [ManageBlogController::class, 'update'])->name('manageblog.update');
    Route::delete('/manageblog/{id}', [ManageBlogController::class, 'destroy'])->name('manageblog.destroy');

    // Gallery Routes
    Route::middleware('checkrole:admin,employee')->group(function () {
        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    });

    // Services Routes
    Route::middleware('checkrole:admin')->group(function () {
        Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
        Route::post('/services', [ServicesController::class, 'store'])->name('services.store');
        Route::put('/services/{id}', [ServicesController::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');
    });

    // Teams Routes
    Route::middleware('checkrole:admin')->group(function () {
        Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
        Route::post('/teams', [TeamsController::class, 'store'])->name('teams.store');
        Route::put('/teams/{id}', [TeamsController::class, 'update'])->name('teams.update');
        Route::delete('/teams/{id}', [TeamsController::class, 'destroy'])->name('teams.destroy');
    });

    // Branch Routes
    Route::middleware('checkrole:admin')->group(function () {
        Route::get('/branches', [ManageBranchController::class, 'index'])->name('branches.index');
        Route::post('/branches', [ManageBranchController::class, 'store'])->name('branches.store');
        Route::put('/branches/{id}', [ManageBranchController::class, 'update'])->name('branches.update');
        Route::delete('/branches/{id}', [ManageBranchController::class, 'destroy'])->name('branches.destroy');
    });

    // Sales Routes
    Route::middleware('checkrole:admin,employee')->group(function () {
        Route::get('/manage-sales', [ManageSalesController::class, 'index'])->name('sales.index');
        Route::get('/manage-sale/{id}/edit', [ManageSalesController::class, 'edit'])->name('sales.edit');
        Route::put('/manage-sale/{id}', [ManageSalesController::class, 'update'])->name('sales.update');
        Route::delete('/manage-sale/{id}', [ManageSalesController::class, 'destroy'])->name('sales.destroy');
        Route::get('/record-sale', [RecordSalesController::class, 'create'])->name('sales.create');
        Route::post('/record-sale', [RecordSalesController::class, 'store'])->name('sales.store');
        Route::get('/sales/print', [ManageSalesController::class, 'print'])->name('sales.print');
        Route::put('/sales/{id}/change-status', [ManageSalesController::class, 'changeStatus'])->name('sales.changeStatus');
    });





    require_once 'profile.php';
});

// Include Authentication Routes
require __DIR__ . '/auth.php';
