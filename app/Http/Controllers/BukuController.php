<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
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
            'title' => 'Daftar Buku',
            'buku' => Buku::all(),
        ];
        # kembalikan ke tampilan
        return view('buku.index', $data)->with('i');
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
            'title' => 'Daftar buku',
            'buku' => Buku::all(),
        ];

        # kembalikan ke tampilan
        return view('buku.create', $data)->with('i');
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
            'sampul' => 'required|image|max:2048',
            'isbn' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'rak' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun_buku' => 'required',
            'jumlah_buku' => 'required',
            'lampiran_buku' => 'required|max:2048',
            'keterangan_lain' => 'required',
        ]);

        # nama gambar uuid versi 4
        $namaSampul = Uuid::uuid4();
        $namaLampiran = Uuid::uuid4();

        #pindahkan gambar
        $pindahSampul =  $request->file('sampul')->move(public_path('sampul'), $namaSampul);

        if (!pindahkanSampul) {
            return redirect()->route('daftar.index')->with('failed', 'Gagal unggah gambar');
        }

        # olah sebelum insert
        $insert = [
            'sampul' => $namaSampul,
            'isbn' => $request->input('isbn'),
            'judul_buku' => $request->input('judul_buku'),
            'kategori' => $request->input('kategori'),
            'rak' => $request->input('kategori'),
            'penerbit' => $request->input('judul_buku'),
            'pngarang' => $request->input('pengarang'),
            'tahun_buku' => $request->input('tahun_buku'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'lampiran_buku' => $namaLampiran,
            'keterangan_lain' => $request->input('keterangan_lain'),
            'dibuat_oleh' => 'Auth'::user()->name
        ];

        try {
            # proses insert
            Buku::create($insert);
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('succes', 'Hi'. Auth::user()->name. ',Berhasil tambah buku');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            Log::critical("Gagal insert", [$e->getMessage()]);
            return redirect()->route('daftar.index')->with('failed', 'Gagal insert buku');
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Buku $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('show', compact('buku'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # kembalikan ke tampilan
        return view('buku.edit', [
            'title' => 'Edit buku',
            'edit_buku' => Buku::where('id', $id)->first(),
            'buku' => Buku::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    { {
        $request->validate([
            'sampul' => 'required|image',
            'isbn' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'rak' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'jumlah_buku' => 'required',
            'lampiran_buku' => 'required',
            'keterangan_lain' => 'required|min:4|max:225'
        ]);

            # coba update
            try {
                # proses update
                $buku->update($request->all());
                # kembalikan ke tampilan
                return redirect()->route('daftar.index')->with('success', 'Hi ' . Auth::user()->name . ', Berhasil update buku');
            } catch (\Exception $e) { # jika gagal
                # kembalikan ke tampilan
                return redirect()->route('daftar.index')->with('failed', 'Gagal update buku');
            }
        }
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku = Buku::findOrFail($id);
$buku->delete();
 return redirect()->route('daftar.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete buku');
        # coba update
        // try {
        //     $buku = Buku::findOrFail($id);
            # proses delete
            // $buku->delete();
            # kembalikan ke tampilan
        //     return redirect()->route('daftar.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete buku');
        // } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
        //     return redirect()->route('daftar.index')->with('failed', 'Gagal delete buku');
        // }
    }
}
