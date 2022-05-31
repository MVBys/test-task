<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'title',
        'link',
    ];

    public function medical_product()
    {
        return $this->hasMany(MedicinalProduct::class);
    }
}
