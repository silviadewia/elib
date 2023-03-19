<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
            'pinjam' => Pinjam::where('status', '0')->get()
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
            'anggota' => User::where('level', '1')->get(),
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
            'tgl_peminjaman' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'id_anggota' => 'required',
            'lama' => 'required|min:1|max:3',
            'id_buku' => 'required|json',
        ]);

         # olah sebelum insert
         $insert = [
            'tanggal_pinjam' => Carbon::parse($request->input('tgl_peminjaman'))->toDateString(),
            'tanggal_kembali' => Carbon::parse($request->input('tgl_pengembalian'))->toDateString(),
            'id_anggota' => $request->input('id_anggota'),
            'lama' => $request->input('lama'),
            'id_buku' => $request->input('id_buku'),
            'denda' => 0,
            'dibuat_oleh' => Auth::user()->name,
            'status' => 0,
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

        $dikembalikan = [
            'tanggal_kembali' => Carbon::now()->toDateString(),
            'denda' => $request->input('denda')??0,
            'status' => 1
        ];

        # coba update
        try {
            # proses update
            Pinjam::where('id', $request->input('id'))->update($dikembalikan);
            Log::info("Berhasil update", [$dikembalikan]);
            # kembalikan ke tampilan
            return redirect()->route('pinjam.index')->with('success', 'Berhasil update pinjam');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            Log::critical("Gagal update", [$e->getMessage()]);
            return redirect()->route('pinjam.index')->with('failed', 'Gagal update pinjam');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjam $pinjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam $pinjam)
    {
        # coba update
        try {
            # proses delete
            $pinjam->delete();
            # kembalikan ke tampilan
            return redirect()->route('pinjam.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete pinjam');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('pinjam.index')->with('failed', 'Gagal delete pinjam');
        }
    }
}
