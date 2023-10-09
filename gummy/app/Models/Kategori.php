<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];


    public function kategori()
    {
        return $this->hasOne(Barang::class, 'kategori_id', 'id', 'nama_kategori');
    }
}
