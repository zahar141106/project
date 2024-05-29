<?php

namespace App\Interfaces;

interface BaseController
{
    public function processRequest(string $requestMethod, string $action, int $entityId);
}