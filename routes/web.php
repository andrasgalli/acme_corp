<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MakeDonationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Campaigns\ListCampaignsController;
use App\Http\Controllers\Admin\Campaigns\CreateCampaignController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [HomeController::class, 'listCampaigns'])->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/terms-and-conditions', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy');

Route::post('/make-donation', [MakeDonationController::class, 'makeDonation'])->middleware(['auth'])->name('make_donation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('campaigns')->group(function() {
    Route::get('add', [CreateCampaignController::class, 'showAddForm'])->name('campaigns.add');
    Route::post('create', [CreateCampaignController::class, 'createCampaign'])->name('campaigns.create');
});

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('index', [AdminController::class, 'index'])->name('admin');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('missions', [AdminController::class, 'missions'])->name('admin.missions');
    Route::get('campaigns', [AdminController::class, 'campaigns'])->name('admin.campaigns');
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('system', [AdminController::class, 'system'])->name('admin.system');
    Route::get('reports', [AdminController::class, 'reports'])->name('admin.reports');
});

require __DIR__.'/auth.php';

