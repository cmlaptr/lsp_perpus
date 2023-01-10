@extends('layouts.app')

@section('content')

    <div class="container">
        @include('user.component.sidebar')

        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
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
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->buku->judul }}</td>
                        <td>{{ $p->tanggal_peminjaman }}</td>
                        <td>{{ $p->tanggal_pengembalian }}</td>
                        <td>{{ $p->kondisi_buku_saat_dipinjam }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection