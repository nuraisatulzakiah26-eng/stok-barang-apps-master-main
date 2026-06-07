<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_supplier',
        'alamat',
        'telepon',
        'email',
        'katergori_material'
        
    ];
}
