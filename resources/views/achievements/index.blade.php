@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Prestasi</h1>
    <a href="{{ route('achievements.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus mr-1"></i> Tambah Prestasi
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($achievements as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/'.$item->foto) }}" width="70">
                            @else
                                <small>Tidak ada</small>
                            @endif
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->tingkat }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td class="text-center">
                            <a href="{{ route('achievements.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('achievements.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('achievements.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $achievements->links() }}
        </div>
    </div>
</div>

</div>
@endsection
