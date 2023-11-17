<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    use HasFactory;
    # menambahkan property fillable
    protected $fillable = ['nama', 'no hp', 'alamat', 'status', 'tanggal mask', 'tangggal keluar'];
}