<?php

namespace Core;

use Core\App;
use Core\Database;
use Core\Session;


class Authenticator
{

    public function login ( array $user) : void {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];
        if(session_status() === PHP_SESSION_ACTIVE) { 
            session_regenerate_id(true);
        }
    }

    public function logout () : void {
        // log the user out
        Session::destroy();
    }

    public function attempt($email, $password) {       

        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if($user) {

            if (password_verify($password, $user['password'])) {

                $this->login([
                    'email' => $email,
                ]);

                return true;

            }
            
        }

        return false;

    }

}