<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Memanggil model User (yang terhubung ke tabel users di database)
        // dan menjalankan perintah create untuk menambahkan satu baris data baru
        User::create([
            'name' => 'Admin', //Mengisi kolom name pada tabel database dengan teks 'Admin'
            'email' => 'gatot@pcr.ac.id', //Mengisi kolom email dengan alamat 'gatot@pcr.ac.id'
            'password' => Hash::make('gatotkaca') //Mengisi kolom password dengan kata sandi 'gatotkaca'
            // Hash::make() digunakan untuk mengamankan kata sandi dengan mengenkripsi sebelum disimpan di database
        ]);
    }
}
