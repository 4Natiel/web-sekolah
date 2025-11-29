@extends('layouts.admin')

@section('main-content')
<div class="container">

    <h1 class="h3 mb-4 text-gray-800">Edit Ekstrakurikuler</h1>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('extracurriculars.update', $extracurricular->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Ekskul</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ $extracurricular->nama }}" required>
                </div>

                <div class="form-group mt-3">
                    <label>Pembina</label>
                    <select name="pembina_id" class="form-control">
                        <option value="">-- Tidak Ada --</option>

                        @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                                @if($teacher->id == $extracurricular->pembina_id) selected @endif>
                            {{ $teacher->name }}
                        </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Jadwal</label>
                    <input type="text" name="jadwal" class="form-control"
                           value="{{ $extracurricular->jadwal }}">
                </div>

                <div class="form-group mt-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ $extracurricular->deskripsi }}</textarea>
                </div>

                <button class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('extracurriculars.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
