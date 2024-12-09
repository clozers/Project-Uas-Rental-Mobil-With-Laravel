<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mobil extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'harga',
        'nama',
        'warna',
        'no_polisi',
        'jumlah_kursi',
        'tahun_beli',
        'gambar',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
