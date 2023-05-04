<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Denda;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $level = \Auth::user()->level;
        $id_anggota = \Auth::user()->id;

        $data = [
            'count_pinjam' => Pinjam::count(),
            'count_kategori' => Kategori::count(),
            'count_denda' => Denda::count(),
            'count_buku' => Buku::count(),
            'count_user' => User::where('level', 1)->count(),
            'buku_chart' => Buku::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count'),
        ];

        if ($request->search) {
            $search = [];
            $query = Buku::where('judul_buku', 'LIKE', '%' . $request->search . '%')->orWhere('dibuat_oleh', 'LIKE', '%' . $request->search . '%')->get();

            $i = 0;
            foreach ($query as $item) {

                if($level == 1) {
                    $cekPinjam = Pinjam::where('id_buku', $item->id)->where('id_anggota', $id_anggota)->orderBy('tanggal_kembali', 'ASC')->first();
                }else{
                    $cekPinjam = Pinjam::where('id_buku', $item->id)->where('status', 0)->orderBy('tanggal_kembali', 'ASC')->first();
                }

                if ($cekPinjam) {
                    $hitungStok = $item->jumlah_buku - Pinjam::where('id_buku', $item->id)->where('status', 0)->count();
                    $pengembalianTercepat = $cekPinjam->tanggal_kembali;
                } else {
                    $hitungStok = $item->jumlah_buku;
                    $pengembalianTercepat = false;
                }
                $search[$i++] = [
                    'buku' => $item,
                    'pengembalian' => $pengembalianTercepat,
                    'hitungStok' => $hitungStok
                ];
            }

            $data['search'] = $search;
        }

        return view('home', $data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
