<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #variabel tampilan
        $data = [
            'title' => 'Daftar Penerbit',
            'penerbit' => Penerbit::all(),
        ];

        # kembalikan ke tampilan
        return view('penerbit.index', $data)->with('i'); 
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # variable tampilan
        $data = [
            'title' => 'Daftar penerbit'
        ];

        # kembalikan ke tampilan
        return view('penerbit.index', $data);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # validasi data input
        $request->validate([
            'nama' => 'required|min:3|max:25'
        ]);

        # olah sebelum insert
        $insert = [
            'nama' => $request->input('nama'),
            'dibuat_oleh'=> Auth::user()->name,
        ];

        # coba insert
        try {
            # proses insert
            Penerbit::create($insert);

            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil tambah penerbit');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('failed', 'Gagal insert penerbit');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        # variable tampilan
        $data = [
            'title' => 'Edit penerbit',
            'penerbit' => Penerbit::all(),
            'edit_penerbit' => $penerbit
        ];

        # kembalikan ke tampilan
        return view('penerbit.edit', $data)->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penerbit $penebit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        # validasi data
        $request->validate([
            'nama' => 'required|min:3|max:25'
        ]);

        # coba update
        try {
            # proses update
            $penerbit->update($request->all());
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil update penerbit');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('failed', 'Gagal update penerbit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        # coba update
        try {
            # proses delete
            $penerbit->delete();
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete penerbit');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('failed', 'Gagal delete penerbit');
        }
    }
}
