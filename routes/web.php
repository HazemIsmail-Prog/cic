<?php

use App\Http\Middleware\IsAdmin;
use App\Livewire\ItemForm;
use App\Livewire\ItemIndex;
use App\Livewire\RecipeForm;
use App\Livewire\RecipeIndex;
use App\Livewire\UserForm;
use App\Livewire\UserIndex;
use App\Models\Item;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::view('/', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    // User routes
    Route::middleware('can:viewAny,' . User::class)->group(function () {
        Route::get('users', UserIndex::class)->name('user.index');
        Route::get('user-form/{user?}', UserForm::class)->name('user.form');
    });

    // Item routes
    Route::middleware('can:viewAny,' . Item::class)->group(function () {
        Route::get('items', ItemIndex::class)->name('item.index');
        Route::get('item-form/{item?}', ItemForm::class)->name('item.form');
    });

    // Recipe routes
    Route::middleware('can:viewAny,' . Recipe::class)->group(function () {
        Route::get('recipes', RecipeIndex::class)->name('recipe.index');
        Route::get('recipe-form/{recipe?}', RecipeForm::class)->name('recipe.form');
    });
});




require __DIR__ . '/auth.php';
