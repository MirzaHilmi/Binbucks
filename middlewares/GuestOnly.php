<?php
namespace Saphpi\Middlewares;

use Saphpi\Core\Request;
use Saphpi\Core\Middleware;

class GuestOnly extends Middleware {
    public function execute(Request $request): void {
        if (isset($_SESSION['user'])) {
            throw new \Exception('You already logged in', 403);
        }
    }
}
