<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use App\Models\Pinjam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Laporan'
        ];
        return view('laporan.index', $data);
        //
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
    public function store(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'tgl_start' => 'required|date',
            'tgl_end' => 'required|date',
        ]);

         # olah sebelum insert
         $insert = [
            'tgl_start' => Carbon::parse($request->input('tgl_start'))->toDateString(),
            'tgl_end' => Carbon::parse($request->input('tgl_end'))->toDateString(),
        ];

        try {
            // datatable result 
            $get = $pinjam->where('tanggal_pinjam', '>=' ,$insert['tgl_start'])->where('tanggal_kembali', '<',$insert['tgl_end'])->get();
            $result = [
                "data" => $get,
                "recordsTotal" => $get->count(),
                "recordsFiltered" => $get->count(),
            ];
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => [],
            ]);
        }

        return response()->json($result, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}