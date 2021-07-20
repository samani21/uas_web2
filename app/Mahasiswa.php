<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //mengambil table mahasiswa pada database
    protected $table      = 'mahasiswa';
    protected $fillable   = ['user_id','npm','tempat_lahir','tgl_lahir','gender','telepon','alamat'];
    public    $timestamps = false;


    //untuk relasi antara mahasiswa dengan relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');//user_id menunjukkan table user filds id
    }

    public function nilai()
    {
        return $this->hasOne(nilai::class, 'mahasiswa_id','id');
    }
}
