<?php


function generateToken(): string
{
    return bin2hex(random_bytes(16));
}

function getBearerToken() {
    $headers = getallheaders();
    $authHeader = $headers['Authorization'] ?? '';

    if (strpos($authHeader, 'Bearer ') !== 0) {
        http_response_code(401);
        die(json_encode(['message' => 'Token not provided or invalid']));
    }
    return substr($authHeader, 7);
}