<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RakController extends Controller
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
            'title' => 'Daftar Rak',
            'rak' => Rak::all(),
        ];

        # kembalikan ke tampilan
        return view('rak.index', $data)->with('i'); 
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
            'title' => 'Daftar rak'
        ];

        # kembalikan ke tampilan
        return view('rak.index', $data);
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
            Rak::create($insert);

            # kembalikan ke tampilan
            return redirect()->route('rak.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil tambah rak');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('rak.index')->with('failed', 'Gagal insert [rak]');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function show(Rak $rak)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $rak)
    {
        # variable tampilan
        $data = [
            'title' => 'Edit rak',
            'rak' => Rak::all(),
            'edit_rak' => $rak
        ];

        # kembalikan ke tampilan
        return view('rak.edit', $data)->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rak $rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rak $rak)
    {
        # validasi data
        $request->validate([
            'nama' => 'required|min:3|max:25'
        ]);

        # coba update
        try {
            # proses update
            $rak->update($request->all());
            # kembalikan ke tampilan
            return redirect()->route('rak.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil update rak');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('rak.index')->with('failed', 'Gagal update rak');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rak $rak)
    {
        # coba update
        try {
            # proses delete
            $rak->delete();
            # kembalikan ke tampilan
            return redirect()->route('rak.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete rak');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('rak.index')->with('failed', 'Gagal delete rak');
        }
    }
}
