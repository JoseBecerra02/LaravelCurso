<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'profesores';

    protected $casts = [
        'vinculacion' => 'date',
    ];

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}
