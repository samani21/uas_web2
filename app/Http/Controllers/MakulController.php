<?php

namespace App\Http\Controllers;

use App\Makul;
use Illuminate\Http\Request;
Use Alert;

class MakulController extends Controller
{
    //untuk menampilkan data dan halaman index
    public function index()
    {
        $makul = Makul::all();//select * from biaya
       return view('makul.index', compact('makul'));
    }

    //untuk halaman index
    public function create()
    {
        return view('makul.create');
    }

    //untuk memproses menambah data
    public function store(Request $request)
    {
        Makul::create($request->all());
        alert()->success('Sukses','Data berhasil disimpan');
        return redirect()->route('makul');
    }

    //untuk halaman edit
    public function edit($id)
    {
        $makul = Makul::find($id); //select * from namma table where id =$id;
        return view('makul.edit', compact('makul'));
    }

    //untuk memproses mengedit data
   public function update(Request $request,$id)
    {
        $makul = Makul::find($id);
        $makul->update($request->all());
        toast('Yeay Berhasil mengedit data','success');
        return redirect()->route('makul');
    }

    //untuk menghapus data
   public function destroy($id)
    {
       $makul = Makul::find($id);
       $makul->delete();
       toast('Yeay Berhasil menghapus data','success');
       return redirect()->route('makul');
    }
}
