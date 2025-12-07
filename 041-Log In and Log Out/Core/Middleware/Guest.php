<?php

    namespace Core\Middleware;

    class Guest {

        public function handle() {

            if ($_SESSION['user'] ?? false) {
                header('Location: /'); // redirect to home page if user is authenticated
                exit;
            }

        }

    }