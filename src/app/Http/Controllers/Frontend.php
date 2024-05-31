<?php

namespace App\Http\Controllers;

use App\Models\Dalemnegri;
use App\Models\Luar;
use Illuminate\Http\Request;
use App\Models\Product;

class Frontend extends Controller
{
    public function home()
    {
        return view('frontend.index');
    }

    public function pengumuman_dalem_negri()
    {
        $dalem_negri = Dalemnegri::all();
        return view('frontend.pengumuman_dalem_negri',compact('dalem_negri'));
    }

    public function luar_negri()
    {
        $luar_negri = Luar::all();
        return view('frontend.pengumuman_luar_negri',compact('luar_negri'));
    }
    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'nama_mahasiswa'  => 'required',
            'nis'             => 'required',
            'email'           => 'required|email',
            'nomor_telfon'   => 'required',
        ]);

        // Buat data baru
        $data = new Product();
        $data->nama_mahasiswa = $request->nama_mahasiswa;
        $data->nis = $request->nis;
        $data->email = $request->email;
        $data->nomor_telfon = $request->nomor_telfon;
        $data->save();

       // Redirect kembali ke halaman form dengan pesan sukses jika data berhasil disimpan
       return response()->json([
        'success' => true,
        'message' => 'pendaftaran beasiswa anda berhasil !!'
    ]);
    }
}
