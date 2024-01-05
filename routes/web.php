<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\congress;
use App\Http\Controllers\all;
use Illuminate\Support\Facades\Route;

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



//antiregister
Route::get('/register', function () {
    return redirect('/');
});
Route::get('/', function () {
    return redirect('login');
});



//For Study
Route::get('/experiment', function () {
    return view('experiment');
});



//VoucherTracker
    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [all::class, 'dashboard'])->name('dashboard');
    Route::post('/save', [all::class, 'save'])->middleware(['auth', 'verified']);});



    //Mr & Ms GIP 2023
    Route::get('/tally/mmg', [congress::class, 'mmg'])->middleware(['auth', 'verified'])->name('mmg');
    Route::get('/tabulate/mmg', [congress::class, 'mmgtab'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/pna/{id}', [congress::class, 'mmgtabpna'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/bca/{id}', [congress::class, 'mmgtabbca'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/lgfa/{id}', [congress::class, 'mmgtablgfa'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/qna/{id}', [congress::class, 'mmgtabqna'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/pna/save/{id}', [congress::class, 'mmgtabpnasave'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/bca/save/{id}', [congress::class, 'mmgtabbcasave'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/lgfa/save/{id}', [congress::class, 'mmgtablgfasave'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mmg/qna/save/{id}', [congress::class, 'mmgtabqnasave'])->middleware(['auth', 'verified']);
    Route::get('/tally/mmg/close', [congress::class, 'mmgclose'])->middleware(['auth', 'verified']);
    Route::get('/tally/mmg/open', [congress::class, 'mmgopen'])->middleware(['auth', 'verified']);

    //GIP Modern Dance Contest
    Route::get('/tally/gmdc', [congress::class, 'gmdc'])->middleware(['auth', 'verified'])->name('gmdc');
    Route::get('/tabulate/gmdc', [congress::class, 'gmdctab'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/gmdc/save/{id}', [congress::class, 'gmdctabsave'])->middleware(['auth', 'verified']);
    Route::get('/tally/gmdc/close', [congress::class, 'gmdcclose'])->middleware(['auth', 'verified']);
    Route::get('/tally/gmdc/open', [congress::class, 'gmdcopen'])->middleware(['auth', 'verified']);

    //My GIP Experence
    Route::get('/tally/mge', [congress::class, 'mge'])->name('mge');
    Route::get('/tabulate/mge', [congress::class, 'mgetab'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/mge/save/{id}', [congress::class, 'mgetabsave'])->middleware(['auth', 'verified']);
    Route::get('/tally/mge/close', [congress::class, 'mgeclose'])->middleware(['auth', 'verified']);
    Route::get('/tally/mge/open', [congress::class, 'mgeopen'])->middleware(['auth', 'verified']);

    //GIP Congress Quiz Bee
    Route::get('/tally/gcqb', [congress::class, 'gcqb'])->name('gcqb');
    Route::get('/tabulate/gcqb', [congress::class, 'gcqbtab'])->middleware(['auth', 'verified']);
    Route::post('/tabulate/gcqb/save/{id}', [congress::class, 'gcqbtabsave'])->middleware(['auth', 'verified']);
    Route::get('/tally/gcqb/close', [congress::class, 'gcqbclose'])->middleware(['auth', 'verified']);
    Route::get('/tally/gcqb/open', [congress::class, 'gcqbopen'])->middleware(['auth', 'verified']);

    //Participants
    Route::post('/contestants/{id}', [congress::class, 'contestantsup'])->middleware(['auth', 'verified']);
    Route::post('/delete/{id}', [congress::class, 'delete'])->middleware(['auth', 'verified']);
    Route::post('/update/{id}/save', [congress::class, 'save'])->middleware(['auth', 'verified']);
    Route::get('/contestants', [congress::class, 'contestants'])->middleware(['auth', 'verified']);
    Route::post('/addparticipant', [congress::class, 'registercan'])->middleware(['auth', 'verified']);
    
    //end GIP CONGRESS 2023

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
