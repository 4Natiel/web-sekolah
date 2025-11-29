@extends('layouts.admin')

@section('main-content')
<div class="container mt-4">
    <h4>Edit School Data</h4>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('school.update', $school->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Sekolah --}}
        <div class="mt-3">
            <label class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah"
                   value="{{ old('nama_sekolah', $school->nama_sekolah) }}" required>
        </div>

        {{-- Jenjang --}}
        <div class="mt-3">
            <label class="form-label">Jenjang</label>
            <select class="form-control" name="jenjang" required>
                <option value="SD"  {{ old('jenjang', $school->jenjang) == 'SD' ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ old('jenjang', $school->jenjang) == 'SMP' ? 'selected' : '' }}>SMP</option>
                <option value="SMA" {{ old('jenjang', $school->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
            </select>
        </div>

        {{-- Status --}}
        <div class="mt-3">
            <label class="form-label">Status Sekolah</label>
            <select class="form-control" name="status" required>
                <option value="Negeri" {{ old('status', $school->status) == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                <option value="Swasta" {{ old('status', $school->status) == 'Swasta' ? 'selected' : '' }}>Swasta</option>
            </select>
        </div>

        {{-- Alamat --}}
        <div class="mt-3">
            <label class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" name="alamat" rows="2" required>{{ old('alamat', $school->alamat) }}</textarea>
        </div>

        {{-- Email --}}
        <div class="mt-3">
            <label class="form-label">Email Sekolah</label>
            <input type="email" class="form-control" name="email"
                   value="{{ old('email', $school->email) }}">
        </div>

        {{-- Telepon --}}
        <div class="mt-3">
            <label class="form-label">Telepon Sekolah</label>
            <input type="text" class="form-control" name="telepon"
                   value="{{ old('telepon', $school->telepon) }}">
        </div>

        {{-- Website --}}
        <div class="mt-3">
            <label class="form-label">Website</label>
            <input type="text" class="form-control" name="website"
                   value="{{ old('website', $school->website) }}">
        </div>

        {{-- Logo Sekolah --}}
        <div class="mt-3">
            <label class="form-label">Logo Sekolah</label>
            <input type="file" class="form-control" name="logo">

            @if($school->logo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $school->logo) }}" alt="Logo" 
                         width="120" class="img-thumbnail">
                </div>
            @endif
        </div>

        {{-- Deskripsi --}}
        <div class="mt-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="description"
                   value="{{ old('website', $school->description) }}">
        </div>

        {{-- Kota / Kecamatan / Provinsi --}}
        <div class="row mt-3">
            <div class="col-md-4">
                <label class="form-label">Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan"
                       value="{{ old('kecamatan', $school->kecamatan) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control" name="kota"
                       value="{{ old('kota', $school->kota) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Provinsi</label>
                <input type="text" class="form-control" name="provinsi"
                       value="{{ old('provinsi', $school->provinsi) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Data</button>
    </form>
</div>
@endsection
