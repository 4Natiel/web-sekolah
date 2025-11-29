<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'jenjang',
        'status',
        'alamat',
        'kecamatan',
        'kota',
        'provinsi',
        'email',
        'telepon',
        'website',
        'logo',
        'description',
    ];

    public static function singleton(): School
    {
        $school = self::first();
        if (!$school) {
            $school = self::create([
                'nama_sekolah' => 'SMP Negeri 22',
                'npsn' => '30401027',
                'jenjang' => 'SMP',
                'status' => 'Negeri',
                'alamat' => 'Jl. Pahlawan No. 36',
                'kecamatan' => 'Samarinda Ulu',
                'kota' => 'Kota Samarinda',
                'provinsi' => 'Kalimantan Timur',
                'email' => '',
                'telepon' => '',
                'website' => '',
                'logo' => null,
                'description' => 'Sekolah ini diketahui berfokus pada peningkatan kualitas siswa melalui kegiatan Ekstrakurikuler (Ekskul) untuk meningkatkan prestasi sekolah. Selain itu, perpustakaan sekolah juga memiliki visi dan misi untuk Meningkatkan Literasi dan minat baca guru dan siswa dengan menyediakan ribuan koleksi buku dan fasilitas pendukung seperti komputer, serta digunakan sebagai kelas alternatif untuk kegiatan diskusi atau praktik ekskul.',
            ]);
        } else {
        // isi default jika field tertentu kosong
        $school->nama_sekolah = $school->nama_sekolah ?: 'SMP Negeri 22';
        $school->alamat = $school->alamat ?: 'Jl. Pahlawan No. 36';
        
        $school->save();
    }

    return $school;
    }
}
