<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\GameControllerGraph;

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
    return view('home');
});

Route::resource('comments', CommentController::class);

Route::resource('search', SearchController::class);

Route::resource('game', GameController::class);

Route::resource('library', LibraryController::class);

Route::resource('recommend', RecommendController::class);

// Route::get('/recommend', [RecommendController::class, 'index']);



Route::get('/game',[CommentController::class,'index']);

Route::get('/game/{id}',[GameController::class,'show']);

Route::get('/games',[SearchController::class,'index']);

Route::post('/library/state', [LibraryController::class, 'setState'])->name('library.setState');
Route::post('/library/add', [LibraryController::class, 'addGame'])->name('library.addGame');
Route::post('/library/score', [LibraryController::class, 'setOrUpdateScore'])->name('library.setScore');

Route::get('/recommend',[RecommendController::class,'index'])->name('recommend.index');
Route::post('/recommend/storegenre', [RecommendController::class, 'storeGenre'])->name('recommend.storegenre');
Route::post('/recommend/storeweight', [RecommendController::class, 'storeWeight'])->name('recommend.storeweight');
Route::post('/recommend/graph', [GameControllerGraph::class, 'graph'])->name('recommend.storegraph');

Route::get('/user/{id}',[UserController::class,'show'])->name('profile.show');
Route::post('/profile/setbio', [ProfileController::class, 'setBio'])->name('profile.setBio');
Route::post('/profile/setavatar', [ProfileController::class, 'upload'])->name('profile.upload');

Route::view('home', 'home')
	->name('home')
	->middleware(['auth']);

Route::view('profile', 'profile.edit')
	->name('profile.edit')
	->middleware(['auth']);
