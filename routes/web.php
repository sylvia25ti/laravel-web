<?php

use Illuminate\Support\Facades\Route;  //memanggil atau menggunakan Route dari Laravel

use App\Http\Controllers\MahasiswaController;
//memanggil atau menggunakan MahasiswaController dari Laravel

use App\Http\Controllers\MatakuliahController;

//memanggil atau menggunakan MatakuliahController dari Laravel
use App\Http\Controllers\HomeController;

//Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/home' adalah url yang akan diakses oleh user
Route::get('/home', [HomeController::class, 'index']);

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {  //Ketimpa line 35 (jadi gaib)
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

// tanda {} menandakan variabel dinamis yang nilainya bisa berubah-ubah
// sedangkan ? menandakan bahwa parameter ini bersifat opsional (tidak wajib di isi)
Route::get('/nim/{param1?}', function ($param1 = '') { //$param1 = '', karena parameter opsional maka kita memberikan
                                                        //nilai default adalah teks kosong (''), jadi jika pengguna
                                                        //tidak mengetik apa pun setelah /nim, aplikasi tidak akan error
    return 'NIM saya: '.$param1;
});

//Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/about' adalah url yang akan diakses oleh user
Route::get('/about', function () {
    return view('halaman-about'); //Kata 'welcome' merujuk langsung pada file bernama welcome.blade.php
});

//Tanda garis miring tunggal '/' melambangkan root/halaman utama dari sebuah domain website
//ketika pengguna mengetik laravel-web.test tanpa / di browser, tetap bisa diarahkan ke halamannya
Route::get('/', function () {
    return view('welcome'); //'welcome' merujuk langsung ke nama file welcome.blade.php yang berada
});                         // di dalam folder views/welcome.blade.php

//Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/mahasiswa' adalah url yang akan diakses oleh user
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show'); //->name('mahasiswa.show') untuk memberikan nama unik (alias) pada rute tersebut
//sehingga tidak perlu lagi menulis ulang URL mentah /mahasiswa. Cukup memanggil nama aliasnya yaitu mahasiswa.show

//Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
//{param1} adalah parameter wajib yang harus di isi pengguna
//MahasiswaController::class: artinya Mengarahkan rute untuk membuka file Controller bernama MahasiswaController.php
//show': Menunjuk nama fungsi (method) spesifik di dalam file Controller tersebut





//Route::get() artinya kalo ada org membuka url dengan ini lewat browser, tolong tampilkan sesuatu
// '/matakuliah/show' adalah url yang akan diakses oleh user
Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);
// tanda {} menandakan variabel dinamis yang nilainya bisa berubah-ubah sedangkan
// ? menandakan bahwa parameter ini bersifat opsional (tidak wajib di isi)


// resource artinya otomatis menyambungkan 7 jenis URL dan method HTTP ke 7 fungsi bawaan
Route::resource('matakuliah', MatakuliahController::class);

