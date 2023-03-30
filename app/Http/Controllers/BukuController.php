<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

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
            'penerbit' => Penerbit::all(),
            'kategori' => Kategori::all(),
            'rak' => Rak::all(),
            'pengarang' => Pengarang::all(),
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
            'penerbit' => Penerbit::all(),
            'kategori' => Kategori::all(),
            'rak' => Rak::all(),
            'pengarang' => Pengarang::all(),
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
            'tahun' => 'required',
            'jumlah_buku' => 'required',
            'lampiran_buku' => 'required|max:2048',
            'keterangan_lain' => 'required',
        ]);

        # nama gambar uuid versi 4
        $namaSampul = Uuid::uuid4();
        $namaLampiran = Uuid::uuid4();

        #pindahkan gambar
        $pindahSampul =  $request->file('sampul')->move(public_path('sampul'), $namaSampul);

        if (!$pindahSampul) {
            return redirect()->route('daftar.index')->with('failed', 'Gagal unggah gambar')->withInput();;
        }

        // pindahkan lampiran
        $pindahLampiran =  $request->file('lampiran_buku')->move(public_path('lampiran-buku'), $namaLampiran);

        if (!$pindahLampiran) {
            return redirect()->route('daftar.index')->with('failed', 'Gagal unggah lampiran')->withInput();
        }

        # olah sebelum insert
        $insert = [
            'sampul' => $namaSampul,
            'isbn' => $request->input('isbn'),
            'judul_buku' => $request->input('judul'),
            'kategori' => $request->input('kategori'),
            'rak' => $request->input('rak'),
            'penerbit' => $request->input('penerbit'),
            'pengarang' => $request->input('pengarang'),
            'tahun_buku' => $request->input('tahun'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'lampiran_buku' => $namaLampiran,
            'keterangan_lain' => $request->input('keterangan_lain'),
            'dibuat_oleh' => Auth::user()->name
        ];

        try {
            # proses insert
            Buku::create($insert);
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('success', 'Hi' . Auth::user()->name . ', Berhasil tambah buku');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            Log::critical("Gagal insert", [$e->getMessage()]);
            return redirect()->route('daftar.create')->with('failed', 'Gagal insert buku')->withInput();;
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Buku $buku
     * @return \Illuminate\Http\Response
     */
    public function show($buku)
    {
        $buku = Buku::findOrFail($buku);
        return view('buku.show', compact('buku'));
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
            'penerbit' => Penerbit::all(),
            'kategori' => Kategori::all(),
            'rak' => Rak::all(),
            'pengarang' => Pengarang::all(),
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
    {
        $request->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'rak' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'jumlah_buku' => 'required',
            'keterangan_lain' => 'required|min:4|max:225'
        ]);

        $update = [
            'isbn' => $request->input('isbn'),
            'judul_buku' => $request->input('judul'),
            'kategori' => $request->input('kategori'),
            'rak' => $request->input('rak'),
            'penerbit' => $request->input('penerbit'),
            'pengarang' => $request->input('pengarang'),
            'tahun_buku' => $request->input('tahun'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'keterangan_lain' => $request->input('keterangan_lain'),
        ];

        if ($request->hasFile('sampul')) {

            $request->validate([
                'sampul' => 'required|image'
            ]);

            $namaSampulBaru = Uuid::uuid4();
            $pindahSampul =  $request->file('sampul')->move(public_path('sampul'), $namaSampulBaru);

            if ($pindahSampul) {
                File::delete(public_path('sampul/' . $request->input('sampulLama')));

                $update['sampul'] = $namaSampulBaru;
            } else {
                return redirect()->route('daftar.index')->with('failed', 'Gagal unggah sampul');
            }
        }

        if ($request->hasFile('lampiran_buku')) {

            $request->validate([
                'lampiran_buku' => 'required'
            ]);

            $namaLampiranBaru = Uuid::uuid4();
            $pindahLampiran =  $request->file('lampiran_buku')->move(public_path('lampiran-buku'), $namaLampiranBaru);

            if ($pindahLampiran) {
                File::delete(public_path('lampiran-buku/' . $request->input('lampiranLama')));

                $update['lampiran_buku'] = $namaLampiranBaru;
            } else {
                return redirect()->route('daftar.index')->with('failed', 'Gagal unggah lampiran');
            }
        }

        # coba update
        try {
            # proses update
            $buku->where('id', $request->input('id'))->update($update);
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('success', 'Hi ' . Auth::user()->name . ', Berhasil update buku');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('failed', 'Gagal update buku');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku, $id)
    {
        # coba update
        try {
            # proses delete
            $buku = Buku::findOrFail($id);
            $buku->delete();
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('success', 'Hi ' . Auth::user()->name . ', Berhasil delete Buku');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('daftar.index')->with('failed', 'Gagal delete Buku');
        }
    }

    /**
     * Popular Buku
     * 
     * @param \App\Models\Buku $buku
     * @return \Illuminate\Http\Response
     */

    public function populer()
    {

        $buku = Buku::orderBy('created_at', 'desc')->get();

        $data = [
            'title' => 'Buku Populer',
            'populer' => $buku,
            'pengarang' => Pengarang::all(),
        ];

        return view('buku.populer', $data)->with('i');
    }
}
