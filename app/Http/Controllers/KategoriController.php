<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Kategori',
            'kategori' => Kategori::all(),
        ];
    
        return view('kategori.index', $data)->with('i');

        
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
            'title' => 'Daftar kategori'
        ];
        return view('kategori.index', $data); 

        # kembalikan ke tampilan
        return view('kategori.index', $data);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);


        # olah sebelum insert
        $insert = [
            'nama' => $request->input('nama'),
            'dibuat_oleh'=>'Auth'::user()->name,
        ];
        Kategori::create($insert);

        return redirect()->route('kategori.index')->with('success', 'Berhasil tambah kategori');
        # coba insert
        try {
            # proses insert
            Kategori::create($insert);

            # kembalikan ke tampilan
            return redirect()->route('kategori.index')->with('success', 'Berhasil insert kategori');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('kategori.index')->with('failed', 'Gagal insert kategori');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
        # variable tampilan
        $data = [
            'title' => 'Edit kategori',
            'kategori' => Kategori::all(),
            'edit_kategori' => $kategori
        ];

        # kembalikan ke tampilan
        return view('kategori.edit', $data)->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
        # validasi data
        $request->validate([
            'nama' => 'required'
        ]);

        # coba update
        try {
            # proses update
            $kategori->update($request->all());
            # kembalikan ke tampilan
            return redirect()->route('kategori.index')->with('success', 'Berhasil update kategori');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('kategori.index')->with('failed', 'Gagal update kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
        # coba update
        try {
            # proses delete
            $kategori->delete();
            # kembalikan ke tampilan
            return redirect()->route('kategori.index')->with('success', 'Berhasil delete kategori');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('kategori.index')->with('failed', 'Gagal delete kategori');
        }
    }
}
