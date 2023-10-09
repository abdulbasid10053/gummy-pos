<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    use HasFactory;
    protected $table = 'detailpenjualan';
    protected $fillable = ['jumlah_keluar', 'barang_id', 'penjualan_id'];

    public function penjualan()
    {
        return $this->belongsTo(Sales::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
