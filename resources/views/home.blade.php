@extends('layouts.admin')

@section('main-content')

<style>
.card-modern { border:none; border-radius:18px; padding:22px; color:white; box-shadow:0 8px 20px rgba(0,0,0,0.15); transition: transform .2s; }
.card-modern:hover { transform: translateY(-4px); }
.grad-blue { background: linear-gradient(135deg, #4e73df, #224abe); }
.grad-green { background: linear-gradient(135deg, #1cc88a, #13855c); }
.grad-orange { background: linear-gradient(135deg, #f6c23e, #dda20a); }
.grad-purple { background: linear-gradient(135deg, #6f42c1, #4b2a82); }
.icon-modern { font-size: 58px; opacity: 0.25; }
.card-title-modern { font-size: 14px; letter-spacing:.5px; opacity:.9; }
.card-value-modern { font-size: 34px; font-weight:700; margin-top:8px; }
#calendar {min-height: 350px; background: #f9f9f9;} 
</style>


<h1 class="h3 mb-4 text-gray-800">Dashboard Sekolah</h1>

<div class="row">
    <!-- Jumlah Siswa -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-modern grad-blue">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="card-title-modern">Jumlah Siswa</div>
                    <div class="card-value-modern">{{ $widget['students'] ?? 0 }}</div>
                </div>
                <i class="fas fa-user-graduate icon-modern"></i>
            </div>
        </div>
    </div>
    <!-- Jumlah Guru -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-modern grad-green">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="card-title-modern">Jumlah Guru</div>
                    <div class="card-value-modern">{{ $widget['teachers'] ?? 0 }}</div>
                </div>
                <i class="fas fa-chalkboard-teacher icon-modern"></i>
            </div>
        </div>
    </div>
    <!-- Jumlah Kelas -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-modern grad-orange">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="card-title-modern">Jumlah Kelas</div>
                    <div class="card-value-modern">{{ $widget['rooms'] ?? 0 }}</div>
                </div>
                <i class="fas fa-school icon-modern"></i>
            </div>
        </div>
    </div>
    <!-- Jumlah Berita -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-modern grad-purple">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="card-title-modern">Jumlah Berita</div>
                    <div class="card-value-modern">{{ $widget['news'] ?? 0 }}</div>
                </div>
                <i class="fas fa-newspaper icon-modern"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filter Jenjang -->
<form method="GET" class="mb-3">
    <label>Pilih Jenjang:</label>
    <select name="jenjang" onchange="this.form.submit()" class="form-control w-auto d-inline-block">
        <option value="">Semua</option>
        <option value="SMP" {{ ($jenjang ?? '')=='SMP' ? 'selected':'' }}>SMP</option>
        <option value="SMA" {{ ($jenjang ?? '')=='SMA' ? 'selected':'' }}>SMA</option>
    </select>
</form>

<div class="row">

    <!-- KOLOM KIRI (WELCOME + KALENDER) -->
    <div class="col-xl-7 col-lg-7">

        <!-- WELCOME CARD -->
        <div class="card mb-4 shadow border-0" style="border-radius:18px;">
            <div class="card-body">
                <h5 class="font-weight-bold">Selamat Datang, {{ Auth::user()->name }}</h5>
                <p class="mb-0">Semoga harimu menyenangkan!</p>
            </div>
        </div>

        <!-- KALENDER -->
        <div class="card shadow border-0 mb-4" style="border-radius:18px;">
            <div class="card-header bg-white border-0">
                <h6 class="m-0 font-weight-bold text-primary">Kalender</h6>
            </div>
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>

    </div>

    <!-- KOLOM KANAN (INFO SEKOLAH) -->
    <div class="col-xl-5 col-lg-5">

        <div class="card shadow border-0" style="border-radius:18px;">
            <div class="card-header bg-white border-0">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Sekolah</h6>
            </div>
            <div class="card-body">

                <div class="d-flex align-items-center mb-3">
                    <div class="mr-3"><i class="fas fa-university fa-2x text-primary"></i></div>
                    <div><strong>Nama Sekolah</strong><br>{{ $school->nama_sekolah ?? '-' }}</div>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <div class="mr-3"><i class="fas fa-map-marker-alt fa-2x text-danger"></i></div>
                    <div><strong>Alamat</strong><br>{{ $school->alamat ?? '-' }}</div>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <div class="mr-3"><i class="fas fa-envelope fa-2x text-warning"></i></div>
                    <div><strong>Email</strong><br>{{ $school->email ?? '-' }}</div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="mr-3"><i class="fas fa-globe fa-2x text-success"></i></div>
                    <div><strong>Website</strong><br>{{ $school->website ?? '-' }}</div>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection





@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto',
            events: []
        });
        calendar.render();
    }
});
</script>

@endsection



