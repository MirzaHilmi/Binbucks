<?php
namespace Saphpi\Models;

use Exception;
use Saphpi\Core\MySQL;
use Saphpi\Core\Application;

class User {
    public int $ID;
    public string $Name;
    public string $Email;
    public string $Password;

    public static function signUp(
        string $name,
        string $email,
        string $password
    ): void {
        $hashed = password_hash($password, PASSWORD_BCRYPT);

        $query = 'INSERT INTO Users (Name, Email, Password) VALUE (?, ?, ?)';
        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('sss', $name, $email, $hashed);
        $stmt->execute();

        $user = new User;
        $user->ID = MySQL::db()->insert_id;
        $user->Name = $name;
        $user->Email = $email;

        Application::session()->set('user', $user);
    }

    public static function logIn(
        string $email,
        string $password
    ): void {
        $query = 'SELECT Password FROM Users WHERE Email = ? LIMIT 1';
        $stmt = MySQL::db()->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_object(User::class);
        if ($user === null) {
            throw new Exception('User not found');
        }

        if (!password_verify($password, $user->Password)) {
            throw new Exception('Password does not match');
        }

        unset($user->Password, $user->CreatedAt, $user->UpdatedAt);

        Application::session()->set('userID', $user);
    }

    public static function logOut(): void {
        Application::session()->destroy('userID');
    }
}
