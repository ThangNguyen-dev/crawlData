<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vaccinator;
use App\Models\Vnexpress;
use Illuminate\Http\Request;
use App\Http\Resources\VaccinatorRS;

class VaccinatorController extends Controller
{
    public function getProvinces()
    {
        $provinces = Vaccinator::all(['id', 'province']);

        return response()->json(
            [
                'success' => true,
                'province_list' => $provinces
            ],
            200
        );
    }

    /**
     * get detail of province from id or name
     * @return json
     */
    public function getVaccinatorByProvince(Request $request)
    {
        // get province from id or name from request json
        $province = $request->json('data.province_id') ? Vaccinator::find($request->json('data.province_id')) : Vaccinator::where('province', $request->json('data.province_name'))->first();
        if (is_null($province)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Province not found'
                ],
                404
            );
        }
        return response()->json(
            [
                'success' => true,
                'province_detail' => new VaccinatorRS($province),
            ],
            200
        );
    }
}
