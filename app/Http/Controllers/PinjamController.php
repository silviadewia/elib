<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = [
            'title' => 'Daftar Pinjam',
            'pinjam' => Pinjam::all(),
        ];
        return view('pinjam.index', $data)->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Daftar pinjam',
            'pinjam' => Pinjam::all(),
        ];

        return view('pinjam.create', $data)->with('i');
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
            'no_pinjaman' => 'required',
            'tgl_pinjaman' => 'required',
            'id_anggota' => 'required',
            'lama' => 'required',
            'id_buku' => 'required',
            'tanggal_kembali' => 'required',
            'denda' => 'required',
        ]);

         # olah sebelum insert
         $insert = [
            'no_pinjaman' => $request->input('no_pinjaman'),
            'tgl_pinjaman' => $request->input('tgl_pinjaman'),
            'id_anggota' => $request->input('id_anggota'),
            'lama' => $request->input('lama'),
            'id_buku' => $request->input('id_buku'),
            'tanggal_kembali' => $request->input('tanggal_kembali'),
            'denda' => $request->input('denda'),
        ];
        try {
            # proses insert
            Pinjam::create($insert);
            # kembalikan ke tampilan
            return redirect()->route('pinjam.index')->with('success', 'Hi' . Auth::user()->name . ', Berhasil tambah Pinjam');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            Log::critical("Gagal insert", [$e->getMessage()]);
            return redirect()->route('pinjam.index')->with('failed', 'Gagal insert pinjam');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjam $pinjam
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjam $pinjam)
    {
        return view('pinjam.show',compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjam $pinjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam $pinjam)
    {
        //
    }
}

