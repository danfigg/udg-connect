<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion',
        'nombre_original',
        'mime',
    ];

    public function imageable(){
        return $this->morphTo();
    }
}
