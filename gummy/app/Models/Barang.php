<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'harga', 'barcode', 'harga_jual', 'keuntungan', 'satuan_id', 'kategori_id'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id', 'nama_satuan');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id', 'nama_kategori');
    }

    public function barang()
    {
        return $this->hasMany(Barangmasuk::class, 'nama_barang');
    }
}
