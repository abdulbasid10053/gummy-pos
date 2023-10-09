<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    use HasFactory;
    protected $table = 'detailpenjualan';
    protected $fillable = ['jumlah_keluar', 'barang_id', 'penjualan_id'];

    public function jpenjualan()
    {
        return $this->hasMany(Sales::class,);
    }
}
