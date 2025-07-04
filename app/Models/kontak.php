<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = ['alamat', 'email', 'nomer1','nomer2', 'map'];

    public function dkmProfil()
    {
        return $this->hasOne(DkmProfil::class, 'id_kontak');
    }
}
