@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Tambah Jadwal</h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="teacher_id">Guru</label>
          <select name="teacher_id" class="form-control" required>
            <option value="">-- Pilih Guru --</option>
            @foreach ($teachers as $teacher)
              <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="subject_id">Mata Pelajaran</label>
          <select name="subject_id" class="form-control" required>
            <option value="">-- Pilih Mata Pelajaran --</option>
            @foreach ($subjects as $subject)
              <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                {{ $subject->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="day">Hari</label>
          <input type="text" name="day" class="form-control" value="{{ old('day') }}" placeholder="Contoh: Monday" required>
        </div>

        <div class="form-group">
          <label for="start_time">Jam Mulai</label>
          <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
        </div>

        <div class="form-group">
          <label for="end_time">Jam Selesai</label>
          <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
