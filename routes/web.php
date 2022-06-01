<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;




Route::get('/',[HomepageController::class,'index'])->name('index');
Route::get('{title}/{id}.html',[HomepageController::class,'category'])->name('category');
Route::get('{title}/{id}.htm',[HomepageController::class,'post'])->name('post');
Route::get('/iletisim',[HomepageController::class,'contact'])->name('iletisim');
Route::get('sitemap.xml',[HomepageController::class,'sitemap'])->name('sitemap');

require __DIR__.'/auth.php';
require __DIR__.'/solaris.php';
