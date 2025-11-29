@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Sekolah</h1>
        <a href="{{ route('school.edit') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit Profil
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="row">
                <div class="col-md-3 text-center">
                    @if($school->logo)
                        <img src="{{ asset('storage/' . $school->logo) }}" class="img-fluid rounded mb-3" width="150">
                    @else
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded mb-3">
                    @endif
                </div>

                <div class="col-md-9">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Sekolah</th>
                            <td>{{ $school->nama_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>NPSN</th>
                            <td>{{ $school->npsn }}</td>
                        </tr>
                        <tr>
                            <th>Jenjang</th>
                            <td>{{ $school->jenjang }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $school->status }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $school->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>{{ $school->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Kota/Kabupaten</th>
                            <td>{{ $school->kota }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $school->provinsi }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $school->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $school->telepon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>{{ $school->website ?? '-' }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('school.show') }}" class="btn btn-info btn-sm mt-3">
                        <i class="fas fa-eye"></i> Lihat Tentang Sekolah
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
