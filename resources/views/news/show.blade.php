@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Detail Berita</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <h3 class="mb-3">{{ $news->title }}</h3>

            @if($news->image)
                <img src="{{ asset('storage/'.$news->image) }}" class="img-fluid mb-4" style="max-width: 400px; border-radius: 10px;">
            @endif

            <p style="line-height: 1.7; font-size: 16px;">
                {!! nl2br(e($news->content)) !!}
            </p>

            <div class="mt-4">
                <a href="{{ route('news.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
