@extends('layouts.app')

@section('content')
    @include('user.component.sidebar')
    <div class="card">
        <div class="card-header">
            <label for="">Form Peminjaman</label>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.submit_peminjaman') }}" class="form-group">
                @csrf
                <div class="mb-3">
                    <label for="">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" name="tanggal_peminjaman">
                </div>
                <div class="mb-3">
                    <label for="">Pilih Buku</label>
                    <select class="form-select" name="buku_id">
                        @foreach ($buku as $b)
                            <option value="" disabled selected>-- Pilih Opsi --</option>
                            <option value="{{ $b->id }}" {{ isset($buku_id) ? $buku_id == $b->id ? "selected" : "" : ""}}>{{ $b->judul }}</option>                    
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Kondisi Buku</label>
                    <select class="form-select" name="kondisi_buku_saat_dipinjam">
                        <option value="" disabled selected>-- Pilih Opsi --</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <button class="btn btn-primary" type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
    
@endsection