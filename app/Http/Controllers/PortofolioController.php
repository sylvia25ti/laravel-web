<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;

use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPortofolio'] = Portofolio::all();
        return view('admin.portofolio.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data['nama_lengkap'] = $request->nama_lengkap;
        $data['job_title']    = $request->job_title;
        $data['email']        = $request->email;
        $data['telepon']      = $request->telepon;
        $data['alamat']       = $request->alamat;
        $data['about_me']     = $request->about_me;
        $data['skills']       = $request->skills;
        $data['pengalaman']   = $request->pengalaman;

        // Cek jika ada file foto yang di-upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan file ke folder public/images/portofolio
            $file->move(public_path('images/portofolio'), $filename);
            $data['foto'] = $filename;
        }


        Portofolio::create($data);
        return redirect()->route('portofolio.index')->with('success', 'Penambahan Data Portofolio Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $data['portofolio'] = Portofolio::findOrFail($id);
    return view('admin.portofolio.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['portofolio'] = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portofolio_id = $id;
        $portofolio = Portofolio::findOrFail($portofolio_id);

        $portofolio->nama_lengkap = $request->nama_lengkap;
        $portofolio->job_title    = $request->job_title;
        $portofolio->email        = $request->email;
        $portofolio->telepon      = $request->telepon;
        $portofolio->alamat       = $request->alamat;
        $portofolio->about_me     = $request->about_me;
        $portofolio->skills       = $request->skills;
        $portofolio->pengalaman   = $request->pengalaman;

        // Cek jika ada file foto baru yang di-upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada di folder
            if ($portofolio->foto && file_exists(public_path('images/portofolio/' . $portofolio->foto))) {
                unlink(public_path('images/portofolio/' . $portofolio->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/portofolio'), $filename);
            $portofolio->foto = $filename; // simpan nama file foto baru
        }

        $portofolio->save();


        return redirect()->route('portofolio.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portofolio_id = $id;
        $portofolio = Portofolio::findOrFail($portofolio_id);

    // Hapus file foto dari folder public/images/portofolio jika ada
    if ($portofolio->foto && file_exists(public_path('images/portofolio/' . $portofolio->foto))) {
        unlink(public_path('images/portofolio/' . $portofolio->foto));
    }

    $portofolio->delete();
    return redirect()->route('portofolio.index')->with('success', 'Data Portofolio Berhasil Dihapus!');}
    }

