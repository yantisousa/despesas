<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesas extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'user_id', 'nome', 'desc', 'valor', 'pago'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id','id');
    }
}
