<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Menampilkan form tambah matakuliah";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Menyimpan data matakuliah baru";
    }

    /**
     * Display the specified resource.
     */

    // "?" sebelum string  artinya variabel $kode boleh berisi teks (string), atau boleh bernilai kosong
    // $kode = null (Default Value) artinya parameter $kode bersifat opsional
    public function show(?string $kode = null)
    {
        if ($kode) {
            return "Anda mengakses matakuliah " . $kode;
        }

        return "Masukkan kode matakuliah!";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Menampilkan form edit matakuliah";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Memperbarui data matakuliah";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus data matakuliah";
    }
}
