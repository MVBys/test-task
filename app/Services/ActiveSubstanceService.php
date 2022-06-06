<?php

namespace App\Services;

use App\Models\ActiveSubstance;

class ActiveSubstanceService extends Services
{

    public function __construct(ActiveSubstance $model)
    {
        $this->model = $model;
    }

}
