<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //$request adalah parameter unutk menangkap data luar
    {
        //dd($request->all());

        //->input('nama') artinya mengambil data bernama 'nama' yang dikirimkan dari pengguna
        //$data['nama'] atinya menyimpannya ke dalam sebuah array variabel bernama $data dengan kunci (key) 'nama'
        $data['nama'] = $request->input('nama');
        $data['email'] = $request->input('email'); //menangkap data
        $data['pertanyaan'] = $request->input('pertanyaan'); //menangkap data inputan pertanyaan

        //buka tampilan dan mengirim data ke view home-question-respon.blade.php
        return view('home-question-respon', $data);
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
