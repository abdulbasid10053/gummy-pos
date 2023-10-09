<?php

namespace App\Models;

use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\UserController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'nama',
        'email',
        'hp',
        'Jabatan',
        'status',
        'level',
        'created_at',
        'updated_at'
    ];
    public function barang_masuk()
    {
        return $this->hasMany(Barangmasuk::class);
    }
    public function barang_keluar()
    {
        return $this->belongsTo(Barangkeluar::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
