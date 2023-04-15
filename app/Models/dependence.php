<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dependence extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name',
        'type',
        'capacity',
        'status',

    ];

    public function personal(){
        return $this->belongsToMany(personal::class, 'personal_dependence');
    }
}
