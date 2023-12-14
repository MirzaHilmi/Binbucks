<?php
namespace Saphpi\Middlewares;

use Saphpi\Core\Request;
use Saphpi\Core\Middleware;

class Authenticated extends Middleware {
    public function execute(Request $request): void {
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Unauthorized Request', 401);
        }
    }
}
