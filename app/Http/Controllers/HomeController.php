<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index(Request $request)
{
    $users = User::count();
    $student = Student::count();
    $teacher = Teacher::count();
    $room = SchoolClass::count();
    $news = News::count();

    $widget = [
        'users' => $users,
        'students' => $student,
        'teachers' => $teacher,
        'rooms' => $room,
        'news' => $news,
    ];

    // Ambil data sekolah menggunakan singleton()
    $school = School::singleton();
     // Filter jenjang (opsional)
        $jenjang = $request->input('jenjang', null);

        /// Tahun ini saja
        $currentYear = Carbon::now()->year;
        $chart_labels = [$currentYear];
        $chart_data   = [Student::whereYear('created_at', $currentYear)->count()];

    // Kirim semua variabel ke view
    return view('home', compact('widget', 'school'));
}
}
