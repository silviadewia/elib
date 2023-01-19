<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DendaController extends Controller
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
            'title' => 'Daftar Denda',
            'denda' => Denda::all(),
        ];

        # kembalikan ke tampilan
        return view('denda.index', $data)->with('i'); 
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
            'title' => 'Daftar denda'
        ];

        # kembalikan ke tampilan
        return view('denda.index', $data);
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
            'harga' => 'required|min:4|max:25',
            'status' => 'required'
        ]);

        # olah sebelum insert
        $insert = [
            'harga' => $request->input('harga'),
            'status' => $request->input('status'),
            'dibuat_oleh'=> Auth::user()->name,
        ];

        # coba insert
        try {
            # proses insert
            Denda::create($insert);

            # kembalikan ke tampilan
            return redirect()->route('denda.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil tambah Denda');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('denda.index')->with('failed', 'Gagal insert Denda');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function edit(Denda $denda)
    {
        # variable tampilan
        $data = [
            'title' => 'Edit denda',
            'denda' => Denda::all(),
            'edit_denda' => $denda
        ];

        # kembalikan ke tampilan
        return view('denda.edit', $data)->with('i');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denda $denda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denda $denda)
    {
        # validasi data
        $request->validate([
            'harga' => 'required|min:3|max:25',
            'status' => 'required'
        ]);

        # coba update
        try {
            # proses update
            $denda->update($request->all());
            # kembalikan ke tampilan
            return redirect()->route('denda.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil update denda');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('denda.index')->with('failed', 'Gagal update denda');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denda $denda)
    {
        # coba update
        try {
            # proses delete
            $denda->delete();
            # kembalikan ke tampilan
            return redirect()->route('denda.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete denda');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('denda.index')->with('failed', 'Gagal delete denda');
        }
    }
}
