@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tentang Sekolah</h1>
        <a href="{{ route('school.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            @if($school->logo)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $school->logo) }}" width="180" class="rounded shadow">
                </div>
            @endif

            <h3 class="text-primary text-center">{{ $school->nama_sekolah }}</h3>
            <p class="text-center text-muted">{{ $school->jenjang }} • {{ $school->status }}</p>

            <hr>

            <h5>Profil Singkat</h5>
            <p>
                {!! $school->description ?? 'Belum ada deskripsi sekolah.' !!}
            </p>

            <hr>

            <h5>Informasi Kontak</h5>
            <p><strong>Alamat:</strong> {{ $school->alamat }}</p>
            <p><strong>Kecamatan:</strong> {{ $school->kecamatan }}</p>
            <p><strong>Kota/Kabupaten:</strong> {{ $school->kota }}</p>
            <p><strong>Provinsi:</strong> {{ $school->provinsi }}</p>
            <p><strong>Email:</strong> {{ $school->email ?? '-' }}</p>
            <p><strong>Telepon:</strong> {{ $school->telepon ?? '-' }}</p>
            <p><strong>Website:</strong> {{ $school->website ?? '-' }}</p>

        </div>
    </div>

</div>
@endsection
