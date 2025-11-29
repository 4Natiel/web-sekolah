@extends('layouts.admin')

@section('main-content')
<div class="container">

  <h1 class="h3 mb-4 text-gray-800">Edit Event</h1>

  <div class="card shadow">
      <div class="card-body">

          <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control" value="{{ $event->judul }}" required>
              </div>

              <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="deskripsi" rows="5" class="form-control" required>{{ $event->deskripsi }}</textarea>
              </div>

              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" value="{{ $event->tanggal }}" required>
              </div>

              <div class="form-group">
                  <label>Gambar Sekarang</label><br>
                  @if($event->gambar)
                      <img src="{{ asset('storage/'.$event->gambar) }}" width="120">
                  @else
                      <p>Tidak ada gambar</p>
                  @endif
              </div>

              <div class="form-group">
                  <label>Ganti Gambar (Opsional)</label>
                  <input type="file" name="gambar" class="form-control-file">
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>

          </form>

      </div>
  </div>

</div>
@endsection
