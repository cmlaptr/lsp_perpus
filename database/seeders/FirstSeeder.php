<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\Pemberitahuan;
use App\Models\Identitas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "kode" => "P4321",	
            "nis" => "",	
            "name" => "Camelia",	
            "username" => "cameliana",	
            "password" => Hash::make('password'),	
            "kelas" => "XII RPL",	
            "alamat" => "Jl.Kober No.35 Rt.08 Rw.02 Kel. Balekambang Kec. Kramat Jati Jakarta Timur", 	
            "verif" => "verified",	
            "role" => "User",	
            "join_date" => "2023-01-17",	
            "terakhir_login" => "2023-01-17" 
        ]);

        Kategori::create([
            "kode" => "P1234",	
            "nama" => "Umum"
        ]);

        Penerbit::create([
            "kode" => "PN234",	
            "nama" => "Erlangga",	
            "verif" => ""
        ]);

        Buku::create([
            "judul" => "Cara Memasak Nasi",
            "kategori_id" => "1",	
            "penerbit_id" => "1",	
            "pengarang" => "Ezhar",	
            "tahun_terbit" => "2010",	
            "isbn" => "",	
            "j_buku_baik" => "1",	
            "j_buku_rusak" => "3"
        ]);

        Peminjaman::create([
            "user_id" => "1",	
            "buku_id" => "1"	,
            "tanggal_peminjaman" => "2023-06-01", 	
            "tanggal_pengembalian" => NULL,
            "kondisi_buku_saat_dipinjam" => "baik",	
            "kondisi_buku_saat_dikembalikan" => "baik", 	
            "denda" => ""
        ]);

        

        Pesan::create([
            "penerima_id" => "1",
            "pengirim_id" => "1",
            "judul" => "Buku dipinjam",
            "isi" => "Buku sedang dipinjam, Harap mengembalikan dalam 30 hari",
            "status" => "Terkirim",
            "tanggal_kirim" => "2023-06-01"
        ]);

        Pemberitahuan::create([
            "isi" => "Tolong Kembalikan Buku Sekarang",	
            "level_user" => "",	
            "status" => "Aktif"
        ]);

        Identitas::create([
            "nama_app" => "Perpus SMKN 10 Jakarta",	
            "alamat_app" => "Jl. Smean 6, Cawang, Kramat Jati, Jakarta Timur",	
            "email_App" => "email@smkn10jakarta.sch.id",	
            "nomor_hp" => "081952774358",	
            "foto" => ""
        ]);
    }
}
