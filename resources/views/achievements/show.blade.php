@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Detail Prestasi</h1>

        <a href="{{ route('achievements.index') }}" class="btn btn-secondary mb-3">
            Kembali
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if ($achievement->foto)
                                <img src="{{ asset('storage/' . $achievement->foto) }}" width="150">
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Judul Prestasi</th>
                        <td>{{ $achievement->judul }}</td>
                    </tr>

                    <tr>
                        <th>Kategori</th>
                        <td>{{ $achievement->kategori }}</td>
                    </tr>

                    <tr>
                        <th>Tingkat</th>
                        <td>{{ $achievement->tingkat }}</td>
                    </tr>

                    <tr>
                        <th>Tahun</th>
                        <td>{{ $achievement->tahun }}</td>
                    </tr>


                    


                </table>

            </div>
        </div>

    </div>
@endsection
