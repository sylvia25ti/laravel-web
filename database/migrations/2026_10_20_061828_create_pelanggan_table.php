<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Fungsi up() adalah perintah utama untuk menjalankan atau menerapkan
    //perubahan ke database saat kamu mengetik perintah migration di terminal
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) { //membuat tabel baru di database dengan nama pelanggan
            $table->increments('pelanggan_id'); //Membuat kolom pelanggan_id yang bertipe integer, berfungsi sebagai Primary Key
                                                //tau jadi PK (karena ada increments)
            $table->string('first_name', 100); //Membuat kolom bernama first_name dengan batasan maksimal 100 karakter
            $table->string('last_name', 100); //Membuat kolom bernama last_name dengan batasan maksimal 100 karakter
            $table->date('birthday')->nullable(); //Membuat kolom bernama birthday dengan tipe data date 
                                                 // (Format: TAHUN-BULAN-HARI), dan dapat bernilai nullable (boleh kosong)
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(); //Membuat kolom pilihan dropdown bernama gender
                                     // yang pilihannya hanya boleh 'Male', 'Female', atau 'Other, boleh bernilai kosong
            $table->string('email')->unique(); //Membuat kolom bernama email bertipe string. Tambahan ->unique()
                                                //memastikan bahwa tidak boleh ada email yang sama di dalam tabel ini
            $table->string('phone', 20)->nullable(); //Membuat kolom bernama phone dengan panjang maksimal 20 karakter,
                                                     //sifatnya boleh dikosongkan
            $table->timestamps(); //Perintah otomatis Laravel untuk langsung membuat dua kolom sekaligus,
            //yaitu created_at (mencatat kapan data dibuat) dan updated_at (mencatat kapan data terakhir diubah)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
