<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GraphWeightController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RecommendWeightController;
use App\Http\Controllers\RecommendGenreController;
use App\Http\Controllers\RecommendGraphController;
use App\Http\Controllers\RecommendController;
use App\Models\GraphWeight;

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

Route::get('/admin/graph', function(){
    $genres = [
        'Fighting',
        'Shooter',
        'Music',
        'Platform',
        'Puzzle',
        'Racing',
        'Real Time Strategy (RTS)',
        'Role-playing (RPG)',
        'Simulator',
        'Sport',
        'Strategy',
        'Turn-based strategy (TBS)',
        'Tactical',
        'Quiz/Trivia',
        "Hack and slash/Beat 'em up",
        'Pinball',
        'Adventure',
        'Arcade',
        'Visual Novel',
        'Indie',
        'Card & Board Game',
        'MOBA',
        'Point-and-click',
      ];
    $edges = GraphWeight::all();
    return view('graph')->with('edges', $edges)->with('genres', $genres);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::resource('/admin/graphWeights', GraphWeightController::class)->middleware('adminRedirect');

Route::resource('/admin/users', UserController::class)->middleware('adminRedirect');

Route::resource('comments', CommentController::class);

Route::resource('search', SearchController::class);

Route::resource('game', GameController::class);

Route::resource('library', LibraryController::class);

Route::resource('recommend', RecommendController::class);

Route::resource('like', LikeController::class);

Route::post('/like/toogle', [LikeController::class, 'toggle'])->name('like.toggle')->middleware('auth');

Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('adminRedirect');

Route::get('/game',[CommentController::class,'index']);

Route::get('/game/{id}',[GameController::class,'show']);

Route::get('/games',[SearchController::class,'index']);

Route::post('/library/state', [LibraryController::class, 'setState'])->name('library.setState');
Route::post('/library/add', [LibraryController::class, 'addGame'])->name('library.addGame');
Route::post('/library/score', [LibraryController::class, 'setOrUpdateScore'])->name('library.setScore');
Route::post('/library/delete', [LibraryController::class, 'deleteGame'])->name('library.deleteGame');

Route::get('/recommend',[RecommendController::class,'index'])->name('recommend.index');
Route::post('/recommend/genre', [RecommendGenreController::class, 'storeGenre'])->name('recommend.storegenre');
Route::post('/recommend/weight', [RecommendWeightController::class, 'storeWeight'])->name('recommend.storeweight');
Route::post('/recommend/graph', [RecommendGraphController::class, 'graph'])->name('recommend.storegraph');

Route::get('/user/{id}',[UserController::class,'show'])->name('profile.show');
Route::post('/profile/setbio', [ProfileController::class, 'setBio'])->name('profile.setBio');
Route::post('/profile/setavatar', [ProfileController::class, 'upload'])->name('profile.upload');

Route::view('profile', 'profile.edit')
	->name('profile.edit')
	->middleware(['auth']);
