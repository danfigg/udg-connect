<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'user_id',
        'votable',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function votable(){
        return $this->morphTo();
    }
}
