<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name')->paginate();

        return response()->json(['cities' => $cities]);
    }

    public function show($id)
    {
        try {
            $city = City::findOrFail($id);

            return response()->json(['city' => $city]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => [
                    'code' => '001',
                    'message' => 'Cidade não encontrada'
                ]
            ], 400);
        }
    }
}
