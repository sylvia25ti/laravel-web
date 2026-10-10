<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //halaman default
    {
    $data = [ // Array Asosiatif (wadah penyimpanan data berkelompok) yang diberi nama variabel $data
	      'username'        => 'Heroku', // Menyimpan data teks (string) berupa nama pengguna yaitu "Heroku".
	      'last_login'      => date('Y-m-d H:i:s'), //date adalah bawaan php
	      'list_pendidikan' => ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'] // Menyimpan data berupa daftar array
	  ];
	  return view('home', $data); //menampilkan halaman web bernama home sambil membawa data yang ada di dalam variabel $data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	$username        = 'Heroku';
	$last_login      = date('Y-m-d H:i:s');
	$list_pendidikan = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
    return view('home', compact('username', 'last_login', 'list_pendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
