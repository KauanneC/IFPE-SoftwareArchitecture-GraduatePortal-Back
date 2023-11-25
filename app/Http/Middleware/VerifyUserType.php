<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class VerifyUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $coordinatorUser = null, string $teacherUser = null): Response {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $token = $request->bearerToken();

        $tokenSecret = (string)getenv('TOKEN_SECRET');

        $tokenDecoded = JWT::decode($token, new Key($tokenSecret, 'HS256'));

        if ($tokenDecoded->profile != $coordinatorUser && $tokenDecoded->profile != $teacherUser) {
            return response()->json(['msg' => 'Usuário não autorizado'], 401);
        }

        return $next($request);
    }
}
