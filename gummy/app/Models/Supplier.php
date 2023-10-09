<?php

namespace App\Models;

use App\Models\Barangmasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = ['nama', 'no_tlp', 'alamat',];

    public function supplier()
    {
        return $this->belongsTo(Barangmasuk::class);
    }
}
