<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;

class ZipCodeCollection extends ResourceCollection
{
    public static $wrap = '';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $zipCode = $this->collection->first();

        $settlements = $this->collection->map(function ($item) {
            return [
                'key' => $item->id_asenta_cpcons,
                'name' => Str::upper($item->d_asenta),
                'zone_type' => Str::upper($item->d_zona),
                'settlement_type' => [
                    'name' => $item->d_tipo_asenta
                ]
            ];
        });


        return [
            'zip_code' => $request->zipCode,
            'locality' => Str::upper($zipCode->d_ciudad),
            'federal_entity' => [
                'key' => $zipCode->c_estado,
                'name' => Str::upper($zipCode->d_estado),
                'code' => '',
            ],
            'settlements' => $settlements,
            'municipality' => [
                'key' => $zipCode->c_mnpio,
                'name' => Str::upper($zipCode->D_mnpio),
            ]
        ];
    }
}
