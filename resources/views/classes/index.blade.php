@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
    <a href="{{ route('classes.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus mr-1"></i> Tambah Kelas
    </a>
  </div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>Kode Kelas</th>
              <th>Nama Kelas</th>
              <th>Guru Pengajar</th>
              <th style="width: 140px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($classes as $class)
              <tr>
                <td>{{ $class->code }}</td>
                <td>{{ $class->name }}</td>
                <td>
                  @forelse ($class->teachers as $teacher)
                    <span class="badge badge-info">{{ $teacher->name }}</span>
                  @empty
                    <span class="text-muted">Belum ada guru</span>
                  @endforelse
                </td>
                <td>
                  <a href="{{ route('classes.edit', $class) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('classes.destroy', $class) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus kelas ini? Tindakan tidak dapat dibatalkan.');">
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
                <td colspan="4" class="text-center text-muted">Belum ada data kelas.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
