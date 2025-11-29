@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Tambah Prestasi</h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label>Judul Prestasi</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Tingkat</label>
                <input type="text" name="tingkat" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Foto (Opsional)</label>
                <input type="file" name="foto" class="form-control-file">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('achievements.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</div>
@endsection
