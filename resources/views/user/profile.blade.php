@extends('layouts.app')

@section('content')
    <div class="container">
        @include('user.component.sidebar')
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4><strong>UPDATE PROFIL</strong></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method("PUT")
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Foto</th>
                    <td>
                        <input type="file" name="foto" class="form-control" value="{{ Auth::user()->foto }}">
                    </td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                        <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
                    </td>
                </tr>
                <tr>
                    <th>NIS</th>
                    <td>
                        <input class="form-control" type="number" name="nis" value="{{ Auth::user()->nis }}">
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        <textarea name="alamat" class="form=control" style="">{{ Auth::user()->alamat }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        <input class="form-control" type="text" name="username" value="{{ Auth::user()->username }}">
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <input class="form-control" type="password" name="password" placeholder="Sandi Belum Diubah">
                    </td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>
                        <input class="form-control" type="text" name="kelas" value="{{ Auth::user()->kelas }}">
                    </td>
                </tr>
            </table>
            
            <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
        </div>
        </div>
    </div>
@endsection