<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function Items(): HasMany
    {
        return $this->hasMany(Item::class, 'categorie_id', 'id');

    }
}
