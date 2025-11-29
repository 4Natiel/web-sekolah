@extends('layouts.admin')

@section('main-content')
<div class="container">

    <h1 class="h3 mb-4 text-gray-800">Tambah Ekstrakurikuler</h1>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('extracurriculars.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Ekskul</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Pembina</label>
                    <select name="pembina_id" class="form-control">
                        <option value="">-- Tidak Ada --</option>
                        @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Jadwal</label>
                    <input type="text" name="jadwal" class="form-control" placeholder="Ex: Jumat, 15.00 - 17.00">
                </div>

                <div class="form-group mt-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                </div>

                <button class="btn btn-primary mt-3">Simpan</button>
                <a href="{{ route('extracurriculars.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
