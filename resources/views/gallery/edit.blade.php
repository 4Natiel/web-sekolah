@extends('layouts.admin')

@section('main-content')
<div class="container">

    <h1 class="h3 mb-4 text-gray-800">Edit Foto Galeri</h1>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Judul Foto</label>
                    <input type="text" name="judul" class="form-control"
                           value="{{ $gallery->judul }}" required>
                </div>

                <div class="form-group mt-3">
                    <label>Foto Saat Ini</label><br>
                    <img src="{{ asset('storage/'.$gallery->gambar) }}" width="150" class="mb-3">
                </div>

                <div class="form-group">
                    <label>Ganti Foto (Opsional)</label>
                    <input type="file" name="gambar" class="form-control-file">
                </div>

                <button class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
