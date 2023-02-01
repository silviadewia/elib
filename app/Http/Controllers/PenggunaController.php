<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'pengguna' => Pengguna::all(),
        ];
        return view('pengguna.index', $data)->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Daftar pengguna',
            'pengguna' => Pengguna::all(),
        ];

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
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'foto' => 'required|image|max:2048',
            'alamat' => 'required'
        ]);

        # nama gambar uuid versi 4
        $foto = Uuid::uuid4();
        #pindahkan gambar
        $pindahFoto =  $request->file('foto')->move(public_path('foto'), $foto);

        if (!$pindahFoto) {
            return redirect()->route('pengguna.index')->with('failed', 'Gagal unggah gambar');
        }

        # olah sebelum insert
        $insert = [
            'nis' => $request->input('nis'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jurusan' => $request->input('jurusan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'level' => $request->input('level'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'telepon' => $request->input('telepon'),
            'email' => $request->input('email'),
            'foto' => $foto,
            'alamat' => $request->input('alamat'),
            'dibuat_oleh' => Auth::user()->name
        ];

        dd(Pengguna::create($insert));

        try {
            # proses insert
            # kembalikan ke tampilan
            return redirect()->route('pengguna.index')->with('success', 'Hi' . Auth::user()->name . ', Berhasil tambah pengguna');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            Log::critical("Gagal insert", [$e->getMessage()]);
            return redirect()->route('pengguna.index')->with('failed', 'Gagal insert pengguna');
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