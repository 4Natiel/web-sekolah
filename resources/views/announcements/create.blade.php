@extends('layouts.admin')

@section('main-content')
<div class="container">

    <h1 class="h3 mb-4 text-gray-800">Tambah Pengumuman</h1>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('announcements.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Isi Pengumuman</label>
                    <textarea name="isi" class="form-control" rows="5" required></textarea>
                </div>

                <div class="form-group mt-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <button class="btn btn-primary mt-3">Simpan</button>
                <a href="{{ route('announcements.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
