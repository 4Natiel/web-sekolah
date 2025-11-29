@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Detail Pengumuman</h1>

    <a href="{{ route('announcements.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <td>{{ $announcement->judul }}</td>
                </tr>

                <tr>
                    <th>Tanggal</th>
                    <td>{{ $announcement->tanggal }}</td>
                </tr>

                <tr>
                    <th>Isi Pengumuman</th>
                    <td>{{ $announcement->isi }}</td>
                </tr>
            </table>

        </div>
    </div>

</div>
@endsection
