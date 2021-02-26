<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::orderBy('name')->paginate();

        return response()->json(['states' => $states]);
    }

    public function show($id)
    {
        try {
            $state = State::findOrFail($id);

            return response()->json(['state' => $state]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => [
                    'code' => '001',
                    'message' => 'Estado não encontrada'
                ]
            ], 400);
        }
    }
}
