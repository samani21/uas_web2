<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Makul;
use App\Nilai;
use Illuminate\Http\Request;
use alert;

class NilaiController extends Controller
{
    //untuk halaman index
    public function index()
    {
         //menampilakn data dari database
        $nilai = Nilai::with(['mahasiswa'])->get(); //relasi dengan table user
        return view('nilai.index', compact('nilai'));
    }

     //untuk halaman menambah data
    public function create()
    {
        $mahasiswa = Mahasiswa::all();//menampilkan relasi dari table mahasiswa
        $makul     = Makul::all();//menampilkan relasi dari table user
        return view('nilai.create', compact('mahasiswa','makul'));
    }

    public function store(Request $request)
    {
        //untuk memperoses menambah data
        Nilai::create($request->all());
        
        alert()->success('Sukses','Data berhasil disimpan');
        return redirect()->route('nilai');
    }

      //untuk halaman edit
    public function edit($id)
   {
        $mahasiswa = Mahasiswa::all();
        $makul     = Makul::all();
        $nilai     = Nilai::find($id); //select * from namma table where id =$id;
        return view('nilai.edit', compact('nilai','mahasiswa','makul'));
   }

   //untuk memproses mengedit data
   public function update(Request $request,$id)
   {
        $nilai = Nilai::find($id);
        $nilai ->update($request->all());
        toast('Yeay Berhasil mengedit data','success');
        return redirect()->route('nilai');
   }

   //untuk menghapus data
   public function destroy($id)
   {
       $nilai = Nilai::find($id);
       $nilai->delete();
       toast('Yeay Berhasil menghapus data','success');
       return redirect()->route('nilai');
   }
}
