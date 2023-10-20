<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidencia extends Model{
    use HasFactory;
    public function comentarios(): HasMany {
        return $this->hasMany(Comentario::class);
    }
    public function categoria(): BelongsTo{
        return $this->belongsTo(Categoria::class);
    }
    public function estado(): BelongsTo{
        return $this->belongsTo(Estado::class);
    }
    public function prioridad(): BelongsTo{
        return $this->belongsTo(Prioridad::class);
    }
}