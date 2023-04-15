<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'cargo',
        'status',
        'rol_id'
    ];
    public function dependence(){
        return $this->belongsToMany(dependence::class, 'personal_dependence');
    }

    public function prestacion(): HasMany
    {
        return $this->hasMany(prestacion::class);
    }
}
