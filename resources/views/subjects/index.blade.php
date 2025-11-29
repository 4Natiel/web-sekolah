@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran</h1>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus mr-1"></i> Tambah Mata Pelajaran
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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Mata Pelajaran</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th style="width: 60px;">ID</th>
              <th>Nama Mata Pelajaran</th>
              <th>Kode</th>
              <th>Deskripsi</th>
              <th style="width: 140px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($subjects as $subject)
              <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->description ?? '—' }}</td>
                <td>
                  <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus mata pelajaran ini? Tindakan tidak dapat dibatalkan.');">
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
                <td colspan="5" class="text-center text-muted">Belum ada data mata pelajaran.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
