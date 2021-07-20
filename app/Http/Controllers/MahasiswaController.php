<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use alert;

class MahasiswaController extends Controller
{
    //untuk halaman index
    public function index()
    {
        //menampilakn data dari database
        $mahasiswa = Mahasiswa::with(['user'])->get(); //relasi dengan table user
       return view('mahasiswa.index', compact('mahasiswa'));
    }

    //untuk halaman menambah data
    public function create()
    {
        $user = User::all();//menampilkan relasi dari table user
        return view('mahasiswa.create', compact('user'));
    }

    //untuk memperoses menambah data
    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        alert()->success('Sukses','Data berhasil disimpan');
        return redirect()->route('mahasiswa');
    }

    //untuk halaman edit
    public function edit($id)
    {
        $user = User::all();
        $mahasiswa = Mahasiswa  ::find($id); //select * from namma table where id =$id;
        return view('mahasiswa.edit', compact('mahasiswa','user'));
    }

   //untuk memproses mengedit data
   public function update(Request $request,$id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa ->update($request->all());
        toast('Yeay Berhasil mengedit data','success');
        return redirect()->route('mahasiswa');
    }

   //untuk menghapus data
   public function destroy($id)
    {
       $mahasiswa = Mahasiswa::find($id);
       $mahasiswa->delete();
       toast('Yeay Berhasil menghapus data','success');
       return redirect()->route('mahasiswa');
    }
}
