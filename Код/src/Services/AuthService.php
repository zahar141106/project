<?php

namespace App\Services;

use App\Database;

class AuthService
{
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance();
    }

    public function auth($request)
    {
        try {
            $user = $this->connection
                ->fetch('SELECT * FROM `users` WHERE login=:login', ['login' => $request['login']]);

            if (!$user || !password_verify($request['password'], $user['password'])) {
                http_response_code(403);
                throw new \Exception('Authorization failed');
            }

            $token = generateToken();

            $this->connection
                ->execute("UPDATE `users` SET `token` = :token WHERE id=:id", [
                    'token' => $token,
                    'id' => $user['id'],
                ]);

            return $token;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function logout($token)
    {
        try {
            $user = $this->connection
                ->fetch('SELECT * FROM `users` WHERE token=:token', ['token' => $token]);

            if (!$user) {
                http_response_code(403);
                throw new \Exception('Authorization failed');
            }

            $this->connection
                ->execute("UPDATE `users` SET `token` = :token WHERE id=:id", [
                    'token' => null,
                    'id' => $user['id'],
                ]);

            return true;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function registration($request)
    {
        try {
            $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);

            return $this->connection
                ->execute('INSERT INTO `users` (`login`, `password`) VALUES (:login, :password)', $request);
        }  catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}