<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

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

Route::get('/home', function () {
    return view('user.home');
});
Route::get('/', function () {
    return view('user.home');
});

Auth::routes();

// Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('role:admin');
// Route::get('/', [HomeController::class, 'index_user'])->name('user')->middleware('role:user');

Route::middleware(['guest'])->group(function () {

});


Route::middleware(['auth'])->group(function () {
    //semua route untuk admin disini

    Route::get('/lapangan', [\App\Http\Controllers\Admin\LapanganController::class, 'index'])->name('lapangan.index')->middleware('role:admin');
    Route::get('/lapangan/create', [\App\Http\Controllers\Admin\LapanganController::class, 'create'])->middleware('role:admin');
    Route::post('/lapangan/store', [\App\Http\Controllers\Admin\LapanganController::class,'store'])->middleware('role:admin');
    Route::get('/lapangan/{id}/update', [\App\Http\Controllers\Admin\LapanganController::class, 'update'])->middleware('role:admin');
    Route::put('/lapangan/{id}', [\App\Http\Controllers\Admin\LapanganController::class, 'edit'])->middleware('role:admin');
    Route::get('/lapangan/{id}/delete', [\App\Http\Controllers\Admin\LapanganController::class, 'delete'])->middleware('role:admin');

    Route::get('/pelatih', [\App\Http\Controllers\Admin\PelatihController::class, 'index'])->name('pelatih.index')->middleware('role:admin');
    Route::get('/pelatih/create', [\App\Http\Controllers\Admin\PelatihController::class, 'create'])->middleware('role:admin');
    Route::post('/pelatih/store', [\App\Http\Controllers\Admin\PelatihController::class,'store'])->middleware('role:admin');
    Route::get('/pelatih/{id}/update', [\App\Http\Controllers\Admin\PelatihController::class, 'update'])->middleware('role:admin');
    Route::put('/pelatih/{id}', [\App\Http\Controllers\Admin\PelatihController::class, 'edit'])->middleware('role:admin');
    Route::get('/pelatih/{id}/delete', [\App\Http\Controllers\Admin\PelatihController::class, 'delete'])->middleware('role:admin');

    Route::get('/member', [\App\Http\Controllers\Admin\MemberController::class, 'index'])->name('member.admin.index')->middleware('role:admin');
    Route::get('/member/create', [\App\Http\Controllers\Admin\MemberController::class, 'create'])->name('member.admin.create')->middleware('role:admin');
    Route::post('/member/store', [\App\Http\Controllers\Admin\MemberController::class,'store'])->name('member.admin.store')->middleware('role:admin');
    Route::get('/member/{id}/update', [\App\Http\Controllers\Admin\MemberController::class, 'update'])->middleware('role:admin');
    Route::put('/member/{id}', [\App\Http\Controllers\Admin\MemberController::class, 'edit']);
    Route::get('/member/{id}/delete', [\App\Http\Controllers\Admin\MemberController::class, 'delete'])->middleware('role:admin');

    Route::get('/kursus', [\App\Http\Controllers\Admin\KursusController::class, 'index'])->name('kursus.admin.index')->middleware('role:admin');
    Route::get('/kursus/create', [\App\Http\Controllers\Admin\KursusController::class, 'create'])->name('kursus.admin.create')->middleware('role:admin');
    Route::post('/kursus/store', [\App\Http\Controllers\Admin\KursusController::class,'store'])->name('kursus.admin.store')->middleware('role:admin');
    Route::get('/kursus/{id}/update', [\App\Http\Controllers\Admin\KursusController::class, 'update'])->middleware('role:admin');
    Route::put('/kursus/{id}', [\App\Http\Controllers\Admin\KursusController::class, 'edit'])->middleware('role:admin');
    Route::get('/kursus/{id}/delete', [\App\Http\Controllers\Admin\KursusController::class, 'delete'])->middleware('role:admin');

    Route::get('/pemesanan', [\App\Http\Controllers\Admin\PemesananController::class, 'index'])->name('pemesanan.admin.index')->middleware('role:admin');
    Route::get('/pemesanan/create', [\App\Http\Controllers\Admin\PemesananController::class, 'create'])->name('pemesanan.admin.create')->middleware('role:admin');
    Route::post('/pemesanan/store', [\App\Http\Controllers\Admin\PemesananController::class,'store'])->name('pemesanan.admin.store')->middleware('role:admin');
    Route::get('/pemesanan/{id}/update', [\App\Http\Controllers\Admin\PemesananController::class, 'update'])->middleware('role:admin');
    Route::put('/pemesanan/{id}', [\App\Http\Controllers\Admin\PemesananController::class, 'edit'])->middleware('role:admin');
    Route::get('/pemesanan/{id}/delete', [\App\Http\Controllers\Admin\PemesananController::class, 'delete'])->middleware('role:admin');
});

Route::get('/pemesanan', [\App\Http\Controllers\PemesananController::class,'index']);
Route::get('pemesanan/create', [\App\Http\Controllers\PemesananController::class,'pemesanan'])->name('pemesanan')->middleware('auth');
Route::post('pemesanan', [\App\Http\Controllers\PemesananController::class,'store'])->name('pemesanan.store');
Route::get('/pemesanan/{id}', [\App\Http\Controllers\PemesananController::class, 'success'])->name('pemesanan.success');

Route::get('/kursus', [\App\Http\Controllers\KursusController::class, 'index']);
Route::get('kursus/create', [\App\Http\Controllers\KursusController::class, 'create'])->name('kursus');
Route::get('kursus/success', [\App\Http\Controllers\KursusController::class,'success'])->name('kursus.success');
Route::post('/kursus/store', [\App\Http\Controllers\KursusController::class, 'store'])->name('kursus.store');

Route::get('/member', [\App\Http\Controllers\MemberController::class, 'index']);
Route::get('member/create', [\App\Http\Controllers\MemberController::class, 'create'])->name('member');
Route::post('/member/store', [\App\Http\Controllers\MemberController::class, 'store']);
Route::get('/member/{id}', [\App\Http\Controllers\MemberController::class, 'success'])->name('member.success');

Route::get('/member/{id}/success', [MemberController::class, 'success'])->name('member.success');

Route::get('/about', function () {
    return view('user.about');
});


