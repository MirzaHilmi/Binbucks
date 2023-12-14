<?php
namespace Saphpi\Core\Console\Commands;

use Saphpi\Core\Console\Command;

class Serve extends Command {
    public function handle(): void {
        if (@($boot = $this->args[0])) {
            exec('cd ' . ROOT . "/{$boot}" . ' && php -S localhost:8080');
            return;
        }

        exec('cd ' . ROOT . '/public' . ' && php -S localhost:8080');
    }
}
