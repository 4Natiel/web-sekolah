@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Pengumuman</h1>

    <a href="{{ route('announcements.create') }}" class="btn btn-primary btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Pengumuman
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $announcement->judul }}</td>
                            <td>{{ $announcement->tanggal }}</td>
                            <td>
                                <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('announcements.edit', $announcement->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('announcements.destroy', $announcement->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $announcements->links() }}

            </div>

        </div>
    </div>

</div>
@endsection
