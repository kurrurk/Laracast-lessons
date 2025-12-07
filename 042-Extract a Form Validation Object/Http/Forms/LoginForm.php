<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {

    protected $errors = [];

    public function validate($email, $password) {


        if ( !Validator::email($email) ) {
            $this->errors['email'] = 'Bitte geben Sie eine gültige E-Mail Adresse an.';
        }

        if ( !Validator::string($password) ) {
            $this->errors['password'] = 'Bitte geben Sie ein gültiges Passwort ein.';
        }

        return empty($this->errors);

    }

    public function errors() {
        return $this->errors;
    }

}