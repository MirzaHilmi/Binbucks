<?php
namespace Saphpi\Controllers;

use Saphpi\Core\Controller;

class GuestController extends Controller {
    public function homepage(): string {
        return $this->render('layouts/app>index');
    }
}
