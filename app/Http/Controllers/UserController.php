<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Memanggil model User agar bisa digunakan di controller ini
use Illuminate\Support\Facades\Hash; // Memanggil fungsi Hash untuk mengenkripsi password

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // User::all() artinya menyuruh Model User mengambil semua
        // data tanpa terkecuali yang ada di dalam tabel database
        // $data['dataUser'] artinya Data yang diambil dari database tadi
        // dimasukkan ke dalam array bernama $data dengan label kunci 'dataUser'
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data); // Menampilkan halaman web
        // bernama index yang berada di dalam folder admin/user sambil membawa data
        // yang ada di dalam variabel $data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){ // Menampilkan halaman form input data

        // Membuka file bernama create.blade.php yang terletak
        // di dalam folder resources/views/admin/user/
        return view('admin.user.create');
        // admin.user.create titik adalah pengganti garis
        // miring (/) untuk menandakan folder di dalam folder views
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        // PASTIKAN BARIS INI MENGARAH KE user.index AGAR KEMBALI KE TABEL DATA
        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
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
    // Menampilkan halaman form edit data user dengan parameter $id
    public function edit(string $id)
    {
        // User::findOrFail($id) artinya menyuruh Model User untuk mengambil
        // data dari tabel database berdasarkan id

        // $data['dataUser'] artinya jika berhasil ditemukan, data tersebut
        // dimasukkan ke dalam array bernama $data dengan label kunci 'dataUser'
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
        // Pergi ke edit.blade.php sambil membawa data
    }

    /**
     * Update the specified resource in storage.
     */
    // Request $request artinya membawa semua data baru yang dikirimkan dari form edit.blade.php
    // string $id adalah nomor id user yang akan diubah datanya
     public function update(Request $request, string $id)
    {
        $user_id = $id;
        $user = User::findOrFail($user_id);

        // Terapkan validasi untuk proses update (email dikondisikan agar tidak bentrok dengan ID sendiri)
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // nullable karena password tidak wajib diisi saat edit
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menerima kiriman $id (nomor identitas unik) user yang mau dihapus
    public function destroy(string $id)
    {
        // Menyuruh Model User untuk mengambil data dari tabel database berdasarkan id
        $user = User::findOrFail($id);

        // Menyuruh Model User untuk menghapus data dari database sesuai instruksi $user->delete() di gambar
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
        // Mengarahkan ke route user.index dengan menampilkan pesan sukses
    }
}
