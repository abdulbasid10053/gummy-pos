<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barangmasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = [
        'jumlah_masuk',
        'user_id',
        'supplier_id',
        'barang_id',
        'satuan_id',
        'tanggal_barang_masuk',
        'nama_barang'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'nama');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id', 'nama_satuan');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id', 'nama');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id', 'nama_barang');
    }
}
