<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
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

    public function getSubstancesWithPaginate($paginate): Paginator
    {
        return $substances = $this->with(['medical_product'])->OrderBy('id', 'desc')->distinct()->paginate(5);
    }

    public function updateSubstance($id, $data): Collection
    {
        $substance = $this->find($id);
        return $substance->update($data);

    }

    public function deleteSubstance($id): String
    {
        $substance = $this->find($id);

        if (!$substance) {
            return 'Substance not exist';
        }

        if ($substance->medical_product->first()) {
            return 'Substance cannot by deleted';
        }
        $substance->delete();
        return 'Substance deleted';
    }

}
