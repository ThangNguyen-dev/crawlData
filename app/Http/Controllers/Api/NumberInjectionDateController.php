<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NumberInjectionDateRS;
use App\Models\NumberInjectionDates;
use Illuminate\Http\Request;

class NumberInjectionDateController extends Controller
{
    /**
     * get provinces
     */
    public function getProvinces()
    {
        $data = NumberInjectionDates::all(['id', 'province']);
        return response()->json(
            [
                'success' => true,
                'province_list' => $data,
            ],
            200
        );
    }

    /**
     * get detail covid by province
     */
    public function getProvinceDetail(Request $request)
    {
        $province = $request->json('data.province_id') ? NumberInjectionDates::find($request->json('data.province_id')) : NumberInjectionDates::where('province', $request->json('data.province_name'))->first();

        if (is_null($province)) {
            return response()->json([
                'success' => false,
                'message' => 'Province not found',
            ], 200);
        }
        return response()->json(
            [
                'success' => true,
                'data' => new NumberInjectionDateRS($province),
            ]
        );
    }
}
