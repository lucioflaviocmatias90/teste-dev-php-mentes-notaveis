<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->fetchAll();

        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            $this->userRepository->create($validated);

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
            $user = $this->userRepository->getById($id);

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

            $this->userRepository->update($id, $validated);

            return response()->json([
                'message' => 'Usuário atualizado com sucesso'
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

    public function destroy($id)
    {
        try {
            $this->userRepository->deleteById($id);

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
