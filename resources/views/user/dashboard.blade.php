@extends('layouts.app')

@section('content')
    @include('user.component.sidebar') 
    
    @foreach ($pemberitahuan as $a)
        <div class="alert alert-info">
            {{ $a->isi }}
        </div>
    @endforeach

    <div class="row">
        @foreach ($buku as $b)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        {{ $b->kategori->nama }}
                    </div>
                    <div class="card-body">
                        <div>{{ $b->judul }}</div>
                        <div>{{ $b->pengarang }}</div>
                        <div>{{ $b->penerbit->nama }}</div>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('user.form_peminjaman') }}">
                            <input type="hidden" value="{{ $b->id }}" name="buku_id">
                            <button class="btn btn-primary" type="submit">Pinjam</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection