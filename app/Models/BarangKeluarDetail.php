<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluarDetail extends Model
{
    protected $fillable = [
        'barang_keluar_id',
        'material_id',
        'total_kubikasi',
    ];

    public function barangKeluar()
    {
        return $this->belongsTo(BarangKeluar::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
