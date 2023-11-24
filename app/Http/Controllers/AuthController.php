<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Domain\UseCases\Auth\PrimaryAcessUseCase;
use App\Domain\UseCases\Auth\LoginUseCase;

class AuthController extends Controller {
    public function __construct(
        private LoginUseCase $loginUseCase,
        private PrimaryAcessUseCase $primaryAcessUseCase
    ){}
    public function login(Request $request){
        try {
            $requestData = $request->only(['email', 'password']);

            $token = $this->loginUseCase->execute($requestData['email'], $requestData['password']);

            Log::info('Usuário logado com sucesso');

            return response()->json(['token' => $token], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'E-mail ou senha incorretos'], 404);
        }
    }

    public function primaryAcess(Request $request){
        try {
            $requestData = $request->only(['email', 'password', 'code']);

            $this->primaryAcessUseCase->execute($requestData['email'], $requestData['password'], $requestData['code']);

            Log::info('Senha do usuário alterada com sucesso');

            return response()->json(['msg' => 'Senha do usuário alterado com sucesso'], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['msg' => 'Error ao alterar senha do usuário'], 400);
        }
    }
}