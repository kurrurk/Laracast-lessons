<?php

    namespace Core\Middleware;

    class Auth {

        public function handle() {

            if (!($_SESSION['user'] ?? false)) {
                header('Location: /'); // redirect to home page if user is not authenticated
                exit();
            }
            
        }

    }