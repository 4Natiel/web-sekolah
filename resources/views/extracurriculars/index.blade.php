@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Data Ekstrakurikuler</h1>

        <a href="{{ route('extracurriculars.create') }}" class="btn btn-primary btn-sm mb-3">
            <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body">

                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Ekskul</th>
                            <th>Pembina</th>
                            <th>Jadwal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($extracurriculars as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->pembina->name ?? '-' }}</td>
                                <td>{{ $item->jadwal ?? '-' }}</td>

                                <td>
                                    <a href="{{ route('extracurriculars.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('extracurriculars.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
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

                {{ $extracurriculars->links() }}

            </div>
        </div>

    </div>
@endsection
