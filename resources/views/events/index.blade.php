@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800">Data Event Sekolah</h1>

  <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm mb-3">
      <i class="fas fa-plus"></i> Tambah Event
  </a>

  @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead class="thead-dark">
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Tanggal</th>
                          <th>Gambar</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($events as $event)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $event->judul }}</td>
                          <td>{{ $event->tanggal }}</td>
                          <td>
                              @if($event->gambar)
                                  <img src="{{ asset('storage/'.$event->gambar) }}" width="70">
                              @else
                                  -
                              @endif
                          </td>
                          <td>
                              <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">
                                  <i class="fas fa-edit"></i>
                              </a>

                              <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus event?')">
                                      <i class="fas fa-trash"></i>
                                  </button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>

              {{ $events->links() }}
          </div>
      </div>
  </div>

</div>
@endsection
