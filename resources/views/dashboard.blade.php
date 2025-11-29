@extends('layouts.app')

@section('content')
<div class="d-flex">

    <!-- SIDEBAR -->
    <nav class="sidebar px-3">
        <h4 class="text-white fw-bold mb-4">SMP Premium</h4>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-book me-2"></i> Pelajaran</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-clipboard-check me-2"></i> Nilai</a>
            </li>

        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="flex-grow-1 p-3">

        <!-- Header -->
        <div class="header-bar mb-4" data-aos="fade-down">
            <h4 class="m-0">Selamat Datang, Siswa!</h4>

            <div class="d-flex align-items-center gap-3">
                <div class="dark-toggle">🌙 Dark</div>
                <div class="user-avatar" style="background-image: url('https://i.pravatar.cc/150');"></div>
            </div>
        </div>

        <div class="row">

            <!-- Jadwal Hari Ini -->
            <div class="col-md-8 mb-4" data-aos="fade-right">
                <div class="card- p-4">
                    <h5 class="card-header mb-3">📘 Jadwal Pelajaran Hari Ini</h5>

                    @if($schedules->count())
                        <ul class="list-group">
                            @foreach($schedules as $item)
                            <li class="list-group-item d-flex justify-content-between border-0">
                                <span>{{ $item->subject }}</span>
                                <strong>{{ $item->start_time }} - {{ $item->end_time }}</strong>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Tidak ada jadwal hari ini.</p>
                    @endif

                </div>
            </div>

            <!-- Nilai Rata-rata -->
            <div class="col-md-4 mb-4" data-aos="fade-left">
                <div class="card p-4 text-center">
                    <h5 class="card-header mb-3">📊 Nilai Rata-rata</h5>
                    <div class="score-number">{{ $avgScore }}</div>
                    <p class="text-muted">Semester terbaru</p>
                </div>
            </div>

        </div>

        <!-- Akses Cepat -->
        <div class="card- p-4" data-aos="fade-up">
            <h5 class="card-header mb-3">⚡ Akses Cepat</h5>

            <div class="row text-center">

                <div class="col-6 col-md-4 mb-3">
                    <a href="#" class="quick-access-btn d-block">
                        <i class="bi bi-laptop"></i>
                        <div class="mt-2 fw-bold">E-Learning</div>
                    </a>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <a href="#" class="quick-access-btn d-block">
                        <i class="bi bi-check2-square"></i>
                        <div class="mt-2 fw-bold">Absensi</div>
                    </a>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <a href="#" class="quick-access-btn d-block">
                        <i class="bi bi-calendar-event"></i>
                        <div class="mt-2 fw-bold">Kalender</div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
