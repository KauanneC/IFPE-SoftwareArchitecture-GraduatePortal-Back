<?php

namespace App\Http\Controllers;

use App\Domain\Dtos\CreateUserDTO;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\CreateUserRequest;

use App\Domain\UseCases\User\GetAllUserByProfileUseCase;
use App\Domain\UseCases\User\RemoveUserUseCase;
use App\Domain\UseCases\User\GetUserByEmailUseCase;
use App\Domain\UseCases\User\CreateUserUseCase;

use App\Http\ViewModel\UserViewModel;

class UserController extends Controller {
    public function __construct(
        private CreateUserUseCase $createUserUseCase,
        private GetUserByEmailUseCase $getUserByEmailUseCase,
        private RemoveUserUseCase $removeUserUseCase,
        private GetAllUserByProfileUseCase $getAllUserByProfileUseCase
    
    ){}
    public function create(CreateUserRequest $request) {
        try {
            $requestData = $request->only(['name', 'email', 'password', 'profile']);

            $user = $this->createUserUseCase->execute(new CreateUserDTO(
                $requestData['name'],
                $requestData['email'],
                $requestData['password'],
                $requestData['profile'],
            ));

            Log::info('Usuário criado com sucesso');

            $userResult = UserViewModel::toHttpCreate($user);

            return $userResult;

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao criar usuário'], 400);
        }
    }

    public function getByEmail(string $email){
        try {

            $user = $this->getUserByEmailUseCase->execute($email);

            Log::info('Usuário encontrado com sucesso');

            $userResult = UserViewModel::toHttpGet($user);

            return $userResult;

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao retornar usuário'], 404);
        }
    }

    public function remove(string $id){
        try {
            $this->removeUserUseCase->execute($id);

            Log::info('Usuário removido com sucesso');

            return response()->json(['msg' => 'Usuário removido com sucesso'], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao remover usuário'], 404);
        }
    }

    public function getAllByProfile(string $profile, int $page = 1){
        try {

            $users = $this->getAllUserByProfileUseCase->execute($profile, $page);

            // dd($users);

            Log::info('Usuários encontrados com sucesso');

            $usersResult = UserViewModel::toHttpGetAll($users);

            return $usersResult;

            // return $users;

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao buscar usuários'], 404);
        }
    }
}