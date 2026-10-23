<?php

use Illuminate\Support\Facades\Route;  // memanggil atau menggunakan Route dari Laravel

// memanggil Controller dari Laravel
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;


// ==========================================
// RUTE DASHBOARD & UTAMA
// ==========================================

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// 'dashboard' adalah url yang akan diakses oleh user
Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard'); // membuat nama alias pada url alih alih memakai dashboard, menjadi dashboard

Route::get('/', [HomeController::class, 'index']);

// ==========================================
// RUTE CRUD (RESOURCE)
// ==========================================

// resource artinya otomatis menyambungkan 7 jenis URL dan method HTTP ke 7 fungsi bawaan
// 'pelanggan' adalah url yang akan diakses oleh user
// PelangganController::class artinya jalankan fungsi yang ada di dalam PelangganController
Route::resource('pelanggan', PelangganController::class);

// resource artinya otomatis menyambungkan 7 jenis URL dan method HTTP ke 7 fungsi bawaan
Route::resource('matakuliah', MatakuliahController::class);

// ==========================================
// RUTE FORM & LAINNYA
// ==========================================

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// 'question/store' adalah url yang akan diakses oleh user
// [QuestionController::class, 'store']) artinya jalankan fungsi store yang ada di dalam QuestionController
Route::post('question/store', [QuestionController::class, 'store'])
        ->name('question.store'); // membuat nama alias pada url alih alih memakai question/store, menjadi question.store

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/home' adalah url yang akan diakses oleh user
Route::get('/home', [HomeController::class, 'index']);

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

// tanda {} menandakan variabel dinamis yang nilainya bisa berubah-ubah
// sedangkan ? menandakan bahwa parameter ini bersifat opsional (tidak wajib di isi)
Route::get('/nim/{param1?}', function ($param1 = '') { //$param1 = '', karena parameter opsional maka kita memberikan
                                                // nilai default adalah teks kosong (''), jadi jika pengguna
                                                // tidak mengetik apa pun setelah /nim, aplikasi tidak akan error
    return 'NIM saya: '.$param1;
});

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/about' adalah url yang akan diakses oleh user
Route::get('/about', function () {
    return view('halaman-about'); // Kata 'welcome' merujuk langsung pada file bernama welcome.blade.php
});

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/mahasiswa' adalah url yang akan diakses oleh user
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show'); // ->name('mahasiswa.show') untuk memberikan nama unik (alias) pada rute tersebut
// sehingga tidak perlu lagi menulis ulang URL mentah /mahasiswa. Cukup memanggil nama aliasnya yaitu mahasiswa.show

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
// {param1} adalah parameter wajib yang harus di isi pengguna
// MahasiswaController::class: artinya Mengarahkan rute untuk membuka file Controller bernama MahasiswaController.php
// 'show': Menunjuk nama fungsi (method) spesifik di dalam file Controller tersebut

// Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/matakuliah/show' adalah url yang akan diakses oleh user
Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);
// tanda {} menandakan variabel dinamis yang nilainya bisa berubah-ubah sedangkan
// ? menandakan bahwa parameter ini bersifat opsional (tidak wajib di isi)
