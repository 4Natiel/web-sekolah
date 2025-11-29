@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Tambah Siswa</h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Nama Siswa</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
          <label for="nis">NIS</label>
          <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis') }}" required>
        </div>

        <div class="form-group">
          <label for="class_id">Kelas</label>
          <select class="form-control" id="class_id" name="class_id" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($classes as $class)
              <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                {{ $class->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
          <label for="phone">Telepon</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
          <label for="photo">Foto</label>
          <input type="file" class="form-control-file" id="photo" name="photo">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
