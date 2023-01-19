<?php
namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'title' => 'Daftar buku'
        ];
        # kembalikan ke tampilan
        return view('buku.index', $data);
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
            'sampul' => 'required',
            'isbn' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'rak' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'jumlah_buku' => 'required',
            'lampiran_buku' => 'required',
            'keterangan_lain' => 'required',
            'dibuat_oleh' => 'required',
            'pinjam' => 'required'
        ]);
        # olah sebelum insert
        $insert = [
            'sampul' => $request->input('sampul'),
            'isbn' => $request->input('isbn'),
            'judul' => $request->input('judul'),
            'kategoi' => $request->input('kategoi'),
            'rak' => $request->input('rak'),
            'penerbit' => $request->input('penerbit'),
            'tahun' => $request->input('tahun'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'lampiran_buku' => $request->input('lampiran_buku'),
            'keterangan_lain' => $request->input('keterangan_lain'),
            'dibuat_oleh' => $request->input('dibuat_oleh'),
            'pinjam' => $request->input('pinjam'),
            'dibuat_oleh'=>'Auth'::user()->name
        ];
        try {
            # proses insert
            buku::create($insert);
            # kembalikan ke tampilan
            return redirect()->route('buku.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil tambah buku');
        } catch (\Exception $e) { # jika gagal
            # kembalikan ke tampilan
            return redirect()->route('buku.index')->with('failed', 'Gagal insert buku');
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
    {
        {
            # validasi data
            $request->validate([
            'sampul' => 'required',
            'isbn' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'rak' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'jumlah_buku' => 'required',
            'lampiran_buku' => 'required',
            'keterangan_lain' => 'required',
            'pinjam' => 'required'
            ]);
    
            # coba update
            try {
                # proses update
                $buku->update($request->all());
                # kembalikan ke tampilan
                return redirect()->route('buku.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil update buku');
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
    public function destroy($buku)
    {
        {
            # coba update
            try {
                # proses delete
                $buku->delete();
                # kembalikan ke tampilan
                return redirect()->route('buku.index')->with('success', 'Hi '.Auth::user()->name.', Berhasil delete buku');
            } catch (\Exception $e) { # jika gagal
                # kembalikan ke tampilan
                return redirect()->route('buku.index')->with('failed', 'Gagal delete buku');
            }
        }
    }
}