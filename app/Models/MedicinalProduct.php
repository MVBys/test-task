<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinalProduct extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'substance_id',
        'manufacturer_id',
        'cost',
    ];

    public function substance()
    {
        return $this->belongsTo(ActiveSubstance::class, 'substance_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

}
