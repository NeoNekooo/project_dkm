<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    use HasFactory;

    protected $table = 'infaq';

    protected $fillable = [
        'headline',
        'description',
        'picture',
        'picture2',
        'nomer_rekening',
        'nama_rekening',
    ];
}
