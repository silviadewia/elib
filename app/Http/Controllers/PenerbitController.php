<?php
namespace App\Http\Controllers;
use App\Models\Penerbit;
use Illuminate\Http\Request;
class PenerbitController extends Controller
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
            'title' => 'Daftar penerbit',
            'penerbit' => Penerbit::all(),
        ];
        return view('Penerbit.index', $data)->with('i');

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
        return view('penerbit.index', $data); 

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
        # validasi data
        $request->validate([
            'nama' => 'required'
        ]);


        # olah sebelum insert
        $insert = [
            'nama' => $request->input('nama'),
            'dibuat_oleh'=>'Auth'::user()->name,
        ];
        Penerbit::create($insert);

        return redirect()->route('penerbit.index')->with('success', 'Berhasil tambah penerbit');
        # coba insert
        try {
            # proses insert
            Penerbit::create($insert);

            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('success', 'Berhasil insert penerbit');
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
        //
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
     * @param  \App\Models\Penerbit $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        //
        # validasi data
        $request->validate([
            'nama' => 'required'
        ]);

        # coba update
        try {
            # proses update
            $penerbit->update($request->all());
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('success', 'Berhasil update penerbit');
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
        //
        # coba update
        try {
            # proses delete
            $penerbit->delete();
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('success', 'Berhasil delete penerbit');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('penerbit.index')->with('failed', 'Gagal delete penerbit');
        }
    }
}