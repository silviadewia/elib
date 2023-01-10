<?php
namespace App\Http\Controllers;
use App\Models\Pengarang;
use Illuminate\Http\Request;
class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # variable tampilan
        $data = [
            'title' => 'Daftar pengarang',
            'pengarang' => Pengarang::all(),
        ];
        return view('Pengarang.index', $data)->with('i');

        # kembalikan ke tampilan
        return view('pengarang.index', $data)->with('i');
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
            'title' => 'Daftar pengarang'
        ];
        return view('pengarang.index', $data); 

        # kembalikan ke tampilan
        return view('pengarang.index', $data);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # validasi data
        $request->validate([
            'nama' => 'required'
        ]);


        # olah sebelum insert
        $insert = [
            'nama' => $request->input('nama'),
            'dibuat_oleh'=>'Auth'::user()->name,
        ];
        Pengarang::create($insert);

        return redirect()->route('pengarang.index')->with('success', 'Berhasil tambah pengarang');
        # coba insert
        try {
            # proses insert
            Pengarang::create($insert);

            # kembalikan ke tampilan
            return redirect()->route('pengarang.index')->with('success', 'Berhasil insert pengarang');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('pengarang.index')->with('failed', 'Gagal insert pengarang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function show(Pengarang $pengarang)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengarang $pengarang)
    {
        //
        # variable tampilan
        $data = [
            'title' => 'Edit pengarang',
            'pengarang' => Pengarang::all(),
            'edit_pengarang' => $pengarang
        ];

        # kembalikan ke tampilan
        return view('pengarang.edit', $data)->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengarang $pengarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengarang $pengarang)
    {
        //
        # validasi data
        $request->validate([
            'nama' => 'required'
        ]);

        # coba update
        try {
            # proses update
            $pengarang->update($request->all());
            # kembalikan ke tampilan
            return redirect()->route('pengarang.index')->with('success', 'Berhasil update pengarang');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('pengarang.index')->with('failed', 'Gagal update pengarang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengarang $pengarang)
    {
        //
        # coba update
        try {
            # proses delete
            $pengarang->delete();
            # kembalikan ke tampilan
            return redirect()->route('pengarang.index')->with('success', 'Berhasil delete pengarang');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('pengarang.index')->with('failed', 'Gagal delete pengarang');
        }
    }
}