<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjamans";
    protected  $fillable = [
        'tanggal_peminjaman',
        'buku_id',
        'user_id',
        'tanggal_pengembalian',
        'kondisi_buku_saat_dipinjam',
        'kondisi_buku_saat_dikembalikan',
        'denda'
    ];

    public function buku(){
        return $this->belongsTo(Buku::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
