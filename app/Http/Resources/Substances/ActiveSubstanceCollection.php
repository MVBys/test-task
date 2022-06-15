<?php

namespace App\Http\Resources\Substances;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActiveSubstanceCollection extends ResourceCollection
{
    public static $wrap = 'substances';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
