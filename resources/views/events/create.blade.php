@extends('layouts.admin')

@section('main-content')
<div class="container">

  <h1 class="h3 mb-4 text-gray-800">Tambah Event</h1>

  <div class="card shadow">
      <div class="card-body">

          <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
              </div>

              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Gambar (Opsional)</label>
                  <input type="file" name="gambar" class="form-control-file">
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>

          </form>

      </div>
  </div>

</div>
@endsection
