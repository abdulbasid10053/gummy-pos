<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barangkeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = ['id', 'jumlah_keluar', 'barang_id', 'user_id', 'tanggal_keluar'];

    //    public function scopeFilter($query, array $fillters)
    //    {
    //         if (isset($fillters['search']) ? $fillters['search'] : false, function($query,$barang)) {
    //             return $query->whereHas('barang', function($query) use ($barang){
    //                 $query->where('slug',$barang)
    //             });
    //         }
    //     }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function scopeFilter($query)
    {
        return $query->whereNull('parent_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'nama');
    }
}
