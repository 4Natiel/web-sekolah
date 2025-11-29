@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit Prestasi</h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-group mb-3">
                <label>Judul Prestasi</label>
                <input type="text" name="judul" value="{{ $achievement->judul }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ $achievement->kategori }}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Tingkat</label>
                <input type="text" name="tingkat" value="{{ $achievement->tingkat }}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" value="{{ $achievement->tahun }}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Foto (Opsional)</label><br>
                @if($achievement->foto)
                    <img src="{{ asset('storage/'.$achievement->foto) }}" width="120" class="mb-2">
                @endif
                <input type="file" name="foto" class="form-control-file">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('achievements.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</div>
@endsection
