<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = ['user_id', 'invoice', 'cash', 'note', 'total_harga', 'diskon', 'customer_id'];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
    // public function barang()
    // {
    //     return $this->belongsTo(Barang::class);
    // }
    // public function penjualan()
    // {
    //     return $this->belongsTo(Sales::class);
    // }
    public function jdetail()
    {
        return $this->belongsTo(Detail_penjualan::class,);
    }
}
