<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    public function destinasi()
    {
        return $this->hasOne(Destinasi::class, 'id','id_destinasi');
    }
}
