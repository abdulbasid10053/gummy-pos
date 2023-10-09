<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuan';
    protected $fillable = ['nama_satuan'];

    public function satuan()
    {
        return $this->hasOne(Barang::class, 'satuan_id', 'id',);
    }
}
