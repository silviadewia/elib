<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class Penggunacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna',
            'pengguna' => Pengguna::all()
        ];
        return view('Pengguna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # variable tampilan
        $data = [
            'title' => 'Daftar pengguna',
            'pengguna' => Pengguna::all()
        ];

        # kembalikan ke tampilan
        return view('pengguna.create', $data)->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_Lahir' => 'required',
            'tanggal_Lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'jenis_Kelamin' => 'required',
            'keterangan_lain' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'foto' => 'required|image|max:2048',
            'alamat' => 'required',
        ]);

        # nama gambar uuid versi 4
        $namafoto = Uuid::uuid4();

        #pindahkan gambar
        $pindahfoto =  $request->file('foto')->move(public_path('foto'), $namaFoto);

        if (!$pindahFoto) {
            return redirect()->route('pengguna.index')->with('failed', 'Gagal unggah gambar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        //
    }
}
