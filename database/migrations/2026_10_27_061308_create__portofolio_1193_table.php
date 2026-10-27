<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('Portofolio_1193', function (Blueprint $table) {
        $table->id('portofolio_id'); //Primary key
        $table->string('nama_lengkap');
        $table->string('job_title');
        $table->string('email');
        $table->string('telepon');
        $table->text('alamat');
        $table->text('about_me');
        $table->text('skills');
        $table->text('pengalaman');
        $table->string('foto')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_portofolio_1193');
    }
};
