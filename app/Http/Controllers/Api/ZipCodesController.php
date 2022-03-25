<?php

namespace App\Http\Controllers\Api;

use App\Models\ZipCode;
use App\Http\Controllers\Controller;
use App\Http\Resources\ZipCodeCollection;

class ZipCodesController extends Controller
{
    public function __invoke($zipCode)
    {
        $query = ZipCode::query();

        $zipCodeCollection = $query->where('d_codigo', $zipCode)->get();

        if ($zipCodeCollection->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron resultados...',
            ]);
        }

        return new ZipCodeCollection($zipCodeCollection);
    }
}
