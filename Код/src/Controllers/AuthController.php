<?php

namespace App\Controllers;

use App\Database;
use App\Interfaces\BaseController;
use App\Services\AuthService;

class AuthController implements BaseController
{
    public function processRequest($requestMethod, $action, $entityId)
    {
        header('Content-Type: application/json');
        $request_data = json_decode(file_get_contents("php://input"),true);
        $response = [];

        switch ($requestMethod) {
            case 'POST':
                if ($action === 'authorization') {
                    $response = $this->authorization($request_data);
                } elseif ($action === 'registration') {
                    $response = $this->registration($request_data);
                } elseif ($action === 'logout') {
                    $bearerToken = getBearerToken();
                    $response = $this->logout($bearerToken);
                }
                break;
            default:
                http_response_code(405);
                die(json_encode('API UNSUPPORTED THIS METHOD'));
        }

        die($response);
    }

    public function authorization($request)
    {
        try {
            $service = new AuthService();
            $token = $service->auth($request);

            return json_encode([
               'status' => true,
               'token' => $token
            ]);
        } catch (\Exception $exception) {
            http_response_code(500);
            return json_encode($exception->getMessage());
        }

    }

    public function registration($request)
    {
        try {
            $service = new AuthService();

            $service->registration($request);

            http_response_code(200);
            return json_encode([
                'status' => true,
            ]);
        } catch (\Exception $exception) {
            http_response_code(500);
            return json_encode($exception->getMessage());
        }
    }

    public function logout(string $token)
    {
        try {
            $service = new AuthService();

            $service->logout($token);

            http_response_code(200);
            return json_encode([
                'status' => true,
            ]);
        } catch (\Exception $exception) {
            http_response_code(500);
            return json_encode($exception->getMessage());
        }
    }
}