<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationExaption;

class LoginForm {

    protected $errors = [];

    public function __construct(public array $attributes) {

        if ( !Validator::email($attributes['email']) ) {
            $this->errors['email'] = 'Bitte geben Sie eine gültige E-Mail Adresse an.';
        }

        if ( !Validator::string($attributes['password']) ) {
            $this->errors['password'] = 'Bitte geben Sie ein gültiges Passwort ein.';
        }

    }

    public static function validate($attributes) {

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw () {
        ValidationExaption::throw( $this->errors(), $this->attributes);
    }
    

    public function failed() {

        return count($this->errors)
;
    }

    public function errors() {

        return $this->errors;

    }

    public function error($field, $message) {

        $this->errors[$field] = $message;

        return $this;
    }

}