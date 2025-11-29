@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Galeri Foto</h1>

        <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-sm mb-3">
            <i class="fas fa-plus"></i> Tambah Foto
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach ($gallery as $item)
                <div class="col-md-3 mb-4">
                    <div class="card shadow">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}"
                            style="width: 100%; height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>

                            <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus foto?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{ $gallery->links() }}

    </div>
@endsection
