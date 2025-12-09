<?php

    namespace Core;

    class ValidationExaption extends \Exception {

        public readonly array $errors;
        public readonly array $old;

        public static function throw ($errors, $old) {

            $instance = new static('Validierung fehlgeschlagen.');

            $instance->errors = $errors;
            $instance->old = $old;

            throw $instance;

        }    

    }