@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Tambah Mata Pelajaran</h1>

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
      <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nama Mata Pelajaran</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
          <label for="code">Kode</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
        </div>
        <div class="form-group">
          <label for="description">Deskripsi</label>
          <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
