<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('address')->orderBy('name')->get();

        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $userData = Arr::except($validated, ['address']);

            $user = User::create($userData);
            $user->address()->create($validated['address']);

            DB::commit();

            return response()->json([
                'message' => 'Usuário criado com sucesso'
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'error' => [
                    'code' => '001',
                    'message' => 'Usuário não encontrado',
                    'err' => $th->getMessage()
                ]
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return new UserResource($user);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => [
                    'code' => '001',
                    'message' => 'Usuário não encontrado'
                ]
            ], 400);
        }
    }

    public function update($id, UserRequest $request)
    {
        try {
            $validated = $request->validated();

            $user = User::findOrFail($id);
            $user->update($validated);

            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => [
                    'code' => '001',
                    'message' => 'Usuário não encontrado'
                ]
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'message' => 'Usuário excluído com sucesso'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => [
                    'code' => '001',
                    'message' => 'Usuário não encontrado'
                ]
            ], 400);
        }
    }
}
