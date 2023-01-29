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
            'keterangan_lain' => 'required|min:4|max:250',
        ]);

        # olah sebelum insert

        $insert = [
            'isbn' => $request->isbn,
            'judul_buku' => $request->judul,
            'kategori' => $request->kategori,
            'rak' => $request->rak,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun_buku' => $request->tahun,
            'jumlah_buku' => $request->jumlah_buku,
            'keterangan_lain' => $request->keterangan_lain,
            'dibuat_oleh' => Auth::user()->name
        ];

        $insert['sampul'] = $request->file('sampul')->storeAs('sampul', Str::slug($request->judul) . '.' . $request->file('sampul')->getClientOriginalExtension());
        $insert['lampiran_buku'] = $request->file('lampiran_buku')->storeAs('lampiran-buku', Str::slug($request->lampiran_buku) . '.' . $request->file('lampiran_buku')->getClientOriginalExtension());

        try {
            # proses insert
            Buku::create($insert);
            # kembalikan ke tampilan
            return redirect()->back()->with('success', 'Hi ' . Auth::user()->name . ', Berhasil tambah buku');
        } catch (\Exception $e) { # jika gagal
            // Cek apakah gambar terupload, hapus jika iya
            if (Storage::exists($insert['sampul'])) {
                Storage::delete($insert['sampul']);
            }
            if (Storage::exists($insert['lampiran_buku'])) {
                Storage::delete($insert['lampiran_buku']);
            }
            # kembalikan ke tampilan
            return redirect()->back()->with('error', 'Gagal insert buku');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
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
                return redirect()->route('buku.index')->with('success', 'Hi ' . Auth::user()->name . ', Berhasil update buku');
            } catch (\Exception $e) { # jika gagal
                # kembalikan ke tampilan
                return redirect()->route('buku.index')->with('failed', 'Gagal update buku');
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
        # coba update
        try {
            # proses delete
            $buku->delete();
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete buku');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('failed', 'Gagal delete buku');
        }
    }
}
