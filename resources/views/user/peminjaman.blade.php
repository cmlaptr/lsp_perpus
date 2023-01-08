@extends('layouts.app')

@section('content')

    <div class="container">
        @include('user.component.sidebar')

        <div class="row">
            <div class="col-6">
                <h3>Buku yg sedang dipinjam</h3>
            </div>
            <div class="col-6">
                <div class="text-end">
                    <a href="{{ route('user.form_peminjaman') }}" class="btn btn-primary">Pinjam Buku</a>
                </div>
            </div>

        <table class="table">
            <thead>
                <tr>No.</tr>
                <tr>Judul Buku</tr>
                <tr>Tanggal Peminjaman</tr>
                <tr>Kondisi Buku</tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $key => $p)
                    {{-- @add($p->buku) --}}
                    @dd($p->buku)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->buku->judul }}</td>
                        <td>{{ $p->tanggal_peminjaman }}</td>
                        <td>{{ $p->kondisi_buku_saat_dipinjam }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection