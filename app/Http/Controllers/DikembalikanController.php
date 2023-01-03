<?php

namespace App\Http\Controllers;

use App\Models\Dikembalikan;
use Illuminate\Http\Request;

class DikembalikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Dikembalikan'
        ];
        return view('Dikembalikan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Dikembalikan  $dikembalikan
     * @return \Illuminate\Http\Response
     */
    public function show(Dikembalikan $dikembalikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dikembalikan  $dikembalikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Dikembalikan $dikembalikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dikembalikan  $dikembalikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dikembalikan $dikembalikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dikembalikan  $dikembalikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dikembalikan $dikembalikan)
    {
        //
    }
}
