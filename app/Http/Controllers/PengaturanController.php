<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
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
            'title' => 'Daftar Pengaturan',
            'pengaturan' => Pengaturan::all(),
        ];

        # kembalikan ke tampilan
        return view('pengaturan.index', $data)->with('i'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            # variable tampilan
            $data = [
                'title' => 'Daftar pengaturan'
            ];
    
            # kembalikan ke tampilan
            return view('pengaturan.index', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }
}
