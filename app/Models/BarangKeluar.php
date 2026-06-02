<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $fillable = [
        'material_id',
        'nama_proyek',
        'jumlah_keluar',
        'total_kubikasi',
        'tanggal_keluar',
        'quantity',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
