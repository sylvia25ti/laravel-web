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
    public function create(){
        return view('admin.user.create');
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
        //$request->password berfungsi untuk mengambil data password mentah yang diketik oleh
        //pengguna melalui form
        //Hash::make($request->password) berfungsi untuk mengenkripsi password mentah

        User::create($data); //Memerintahkan model User untuk memasukkan ($data) ke dalam tabel database
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
        $user_id = $id; //memasukkan no id ke dalam variabel $user_id
        $user = User::findOrFail($user_id); //menyuruh Model User
        //untuk mengambil data dari tabel database berdasarkan id

        // Terapkan validasi untuk proses update (email dikondisikan agar tidak bentrok dengan ID sendiri)
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id, //.' . $user->id dinamakan Ignore ID
                                                                        // (Mengabaikan ID tertentu)
            'password' => 'nullable|string|min:8|confirmed', // nullable karena password tidak wajib diisi
                                                            //saat edit
        ]);

        $user->name = $request->name; //ambil data baru kemudian timpa data lama di kolom name
        $user->email = $request->email;

        if ($request->filled('password')) { //apakah user mengetik password baru? Jika iya, maka lakukan
                                            // enkripsi dan simpan ke database
            $user->password = Hash::make($request->password);
            // digunakan untuk mengenkripsi (mengacak) password baru yang diketik user
        }

        $user->save(); //menyuruh Model User untuk menyimpan data baru ke dalam tabel database
        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
        // Mengarahkan ke route user.index dengan menampilkan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menerima kiriman $id (nomor identitas unik) user yang mau dihapus
    public function destroy(string $id)
    {
        // Menyuruh Model User untuk mengambil data dari tabel database berdasarkan id
        $user = User::findOrFail($id);

        // Menyuruh Model User untuk menghapus data dari database
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
        // Mengarahkan ke route user.index dengan menampilkan pesan sukses
    }
}
