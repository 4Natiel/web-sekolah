@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal Mengajar</h1>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus mr-1"></i> Tambah Jadwal
    </a>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Jadwal</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>Hari</th>
              <th>Jam Mulai</th>
              <th>Jam Selesai</th>
              <th>Guru</th>
              <th>Mata Pelajaran</th>
              <th style="width: 140px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($schedules as $schedule)
              <tr>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
                <td>{{ $schedule->teacher->name }}</td>
                <td>{{ $schedule->subject->name }}</td>
                <td>
                  <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus jadwal ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">Belum ada jadwal.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
