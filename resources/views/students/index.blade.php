@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus mr-1"></i> Tambah Siswa
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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th style="width: 120px;">Foto</th>
              <th>Nama</th>
              <th>NIS</th>
              <th>Kelas</th>
              <th>Email</th>
              <th>Telepon</th>
              <th style="width: 140px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($students as $student)
              <tr>
                <td class="text-center">
                  @if ($student->photo)
                    <img src="{{ asset('storage/'.$student->photo) }}" alt="foto" class="img-thumbnail"
                         style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
                  @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&size=160"
                         class="img-thumbnail" style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
                  @endif
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nis }}</td>
                <td>{{ $student->class->name ?? '—' }}</td>
                <td>{{ $student->email ?? '—' }}</td>
                <td>{{ $student->phone ?? '—' }}</td>
                <td>
                  <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus siswa ini? Tindakan tidak dapat dibatalkan.');">
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
                <td colspan="7" class="text-center text-muted">Belum ada data siswa.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
