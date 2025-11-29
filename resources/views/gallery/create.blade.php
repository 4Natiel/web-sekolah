@extends('layouts.admin')

@section('main-content')
<div class="container">

    <h1 class="h3 mb-4 text-gray-800">Tambah Foto Galeri</h1>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Judul Foto</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Upload Foto</label>
                    <input type="file" name="gambar" class="form-control-file" required>
                </div>

                <button class="btn btn-primary mt-3">Simpan</button>
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
