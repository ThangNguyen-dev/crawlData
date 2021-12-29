<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VnexpressRS;
use App\Models\Vnexpress;
use Illuminate\Http\Request;

class VnexpressController extends Controller
{
    public function gets()
    {
        $vnexpress = Vnexpress::latest()->first();
        return response()->json(
            [
                'success' => true,
                'news_vnexpress' => new VnexpressRS($vnexpress),
            ]
        );
    }
}
