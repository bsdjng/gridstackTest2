<?php
use gridstackTest2\app\Livewire\EditGroundplan;
use gridstackTest2\app\Livewire\LoadGroundplan;
use gridstackTest2\app\Livewire\IndexGroundplan;
use gridstackTest2\app\Livewire\LoadGroundplanApp;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', IndexGroundplan::class)->name('index');
Route::get('/load/{groundplan}', LoadGroundplan::class)->name('load');
Route::get('/load-app/{groundplan}', LoadGroundplanApp::class)->name('load-app');
Route::get('/edit/{groundplan}', EditGroundplan::class)->name('edit');
