<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class prestacion extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'Observacion',
        'fecha_hora_start',
        'fecha_hora_end',
        'status',
        'personal_id',
        'item_id'

    ];


    public function personal(): BelongsTo
    {
        return $this->belongsTo(personal::class);
    }
}
