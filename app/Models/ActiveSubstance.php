<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveSubstance extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'title',
    ];

    public function medical_product()
    {
        return $this->hasMany(MedicinalProduct::class, 'substance_id', 'id');
    }
}
