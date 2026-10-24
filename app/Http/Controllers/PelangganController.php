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
        //Pelanggan::all() artinya menyuruh Model Pelanggan mengambil semua
        //data tanpa terkecuali yang ada di dalam tabel database
        //$data['dataPelanggan'] artinya Data yang diambil dari database tadi
        //dimasukkan ke dalam array bernama $data dengan label kunci 'dataPelanggan'
		$data['dataPelanggan'] = Pelanggan::all();
		return view('admin.pelanggan.index',$data); //menampilkan halaman web
        // bernama index yang berada di dalam folder admin/pelanggan sambil membawa data
        // yang ada di dalam variabel $data
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
    //menampilkan halaman form edit data pelanggan dengan parameter $id
    public function edit(string $id)
    {
    // Pelanggan::findOrFail($id) artinya menyuruh Model Pelanggan untuk mengambil
    //data dari tabel database berdasarkan id

    // $data['dataPelanggan'] artinya jika berhasil ditemukan, data tersebut
    //dimasukkan ke dalam array bernama $data dengan label kunci 'dataPelanggan'
    $data['dataPelanggan'] = Pelanggan::findOrFail($id);
    return view('admin.pelanggan.edit', $data);
    //pergi ke edit.blade.php sambil membawa data
    }

    /**
     * Update the specified resource in storage.
     */
    //Request $request artinya membawa semua data baru yang dikirimkan dari form edit.blade.php
    //string $id adalah nomor id pelanggan yang akan diubah datanya
    public function update(Request $request, string $id)
    {
    $pelanggan_id = $id; //memasukkan nomor id ke dalam variabel $pelanggan_id
    $pelanggan = Pelanggan::findOrFail($pelanggan_id); //menyuruh Model Pelanggan
                        //untuk mengambil data dari tabel database berdasarkan id

    $pelanggan->first_name = $request->first_name; //ambil data baru kemudian timpa data lama di kolom first_name
    $pelanggan->last_name = $request->last_name;
    $pelanggan->birthday = $request->birthday;
    $pelanggan->gender = $request->gender;
    $pelanggan->email = $request->email;
    $pelanggan->phone = $request->phone;

    $pelanggan->save(); //menyuruh Model Pelanggan untuk menyimpan data baru ke dalam tabel database
    return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    // mengarahkan ke route pelanggan.index dengan menampilkan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
