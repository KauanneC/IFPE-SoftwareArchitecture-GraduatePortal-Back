<?php

namespace App\Http\Middleware;

use Closure;
use Dotenv\Dotenv;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\ExpiredException;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        try {
            $token = $request->bearerToken();

            $tokenSecret = (string) getenv('TOKEN_SECRET');

            JWT::decode($token, new Key($tokenSecret, 'HS256'));
        } catch (SignatureInvalidException $e) {
            return response()->json(['msg' => 'Token inválido'], 401);
        } catch (ExpiredException $e) {
            return response()->json(['msg' => 'Token expirado'], 401);
        }

        return $next($request);
    }
}
