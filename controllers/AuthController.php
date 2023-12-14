<?php
namespace Saphpi\Controllers;

use Saphpi\Models\User;
use Saphpi\Core\Request;
use Saphpi\Core\Validator;
use Saphpi\Core\Controller;
use Saphpi\Middlewares\GuestOnly;

class AuthController extends Controller {
    public function __construct() {
        $this->registerMiddlewares(new GuestOnly(['signUp', 'handleSignUp', 'logIn', 'handleLogIn']));
    }

    public function signUp(): string {
        return $this->render('layouts/guest>signup', title: 'BookHaven | Sign Up Now');
    }

    public function handleSignUp(Request $request): void {
        $data = Validator::validate($request->getBody(), [
            'name'                 => ['Required'],
            'email'                => ['Required'],
            'password'             => ['Required'],
            'passwordConfirmation' => ['Required'],
        ]);

        if (isset($data['errors'])) {
            $this->response->withFlash($data['errors'], 'errors');
            $this->redirect('/signup');
            return;
        }

        $payload = $data['validated'];

        if ($payload['password'] !== $payload['passwordConfirmation']) {
            $this->response->withFlash(['passwordConfirmation' => 'Password must be the same!'], 'errors');
            $this->redirect('/signup');
            return;
        }

        try {
            User::signUp($payload['name'], $payload['email'], $payload['password']);
        } catch (\Throwable $th) {
            $this->response->withFlash($th->getMessage());
            $this->redirect('/signup');
            return;
        }

        $this->redirect('/');
    }

    public function logIn(): string {
        return $this->render('layouts/guest>login', title: 'BookHaven | Log In');
    }

    public function handleLogIn(Request $request): void {
        $data = Validator::validate($request->getBody(), [
            'email'    => ['Required'],
            'password' => ['Required'],
        ]);

        if (isset($data['errors'])) {
            $this->response->withFlash($data['errors'], 'errors');
            $this->redirect('/login');
            return;
        }

        $payload = $data['validated'];

        try {
            User::logIn($payload['email'], $payload['password']);
        } catch (\Throwable $th) {
            $this->response->withFlash($th->getMessage());
            $this->redirect('/login');
            return;
        }

        $this->redirect('/');
    }

    public function handleLogOut(): void {
        User::logOut();

        $this->redirect('/');
    }
}
