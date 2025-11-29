@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Guru</h1>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
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
      <form action="{{ route('teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $teacher->name) }}" required>
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip" class="form-control" value="{{ old('nip', $teacher->nip) }}" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email', $teacher->email) }}" required>
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone', $teacher->phone) }}">
        </div>
        <div class="form-group">
          <label>Mata Pelajaran</label>
          <input type="text" name="subject" class="form-control" value="{{ old('subject', $teacher->subject) }}" required>
        </div>
        <div class="form-group">
          <label>Foto</label><br>
          @if ($teacher->photo)
            <img src="{{ asset('storage/'.$teacher->photo) }}" class="img-thumbnail mb-2" style="width:80px; height:80px; object-fit:cover;">
          @endif
          <input type="file" name="photo" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
