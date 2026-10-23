<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; //memanggil model Pelanggan agar bisa digunakan di controller ini

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
		$data['dataPelanggan'] = Pelanggan::all();
		return view('admin.pelanggan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){ //menampilkan halaman form input data

        //membuka file bernama create.blade.php yang terletak
        //di dalam folder resources/views/admin/pelanggan/
		return view('admin.pelanggan.create');
        // admin.pelanngan,create    titik adalah pengganti garis
        //miring (/) untuk menandakan folder di dalam folder views
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

		//dd($request->all()); // Mengintip data form sebelum disimpan (digunakan untuk tahap uji)

		$data['first_name'] = $request->first_name; // Mengambil data dari form input dengan nama first_name
		$data['last_name'] = $request->last_name;
		$data['birthday'] = $request->birthday;
		$data['gender'] = $request->gender;
		$data['email'] = $request->email;
		$data['phone'] = $request->phone;

		Pelanggan::create($data); //Memerintahkan Model Pelanggan untuk memasukkan  ($data) ke dalam tabel database

        // Mengarahkan ke route pelanggan.index dengan menampilkan pesan sukses
		return redirect()->route('pelanggan.index')->with('success','Penambahan Data Berhasil!');
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
