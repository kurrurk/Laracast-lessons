<?php

namespace Core;


class Authenticator
{

    public function login ($user) : void {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout () : void {
        // log the user out
        $_SESSION = []; 
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
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