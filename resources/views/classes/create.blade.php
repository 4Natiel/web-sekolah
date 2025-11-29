@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kelas</h1>
    <a href="{{ route('classes.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="code">Kode Kelas</label>
          <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
          <label for="name">Nama Kelas</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
          <label for="teachers">Guru Pengajar</label>
          <select name="teachers[]" id="teachers" class="form-control" multiple>
            @foreach ($teachers as $teacher)
              <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
          <small class="form-text text-muted">Tekan Ctrl/Cmd untuk memilih lebih dari satu guru.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection
