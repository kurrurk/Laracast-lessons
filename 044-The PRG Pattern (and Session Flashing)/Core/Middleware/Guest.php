<?php

    namespace Core\Middleware;

    class Guest {

        public function handle() {

            if ($_SESSION['user'] ?? false) {
                redirect('/'); // redirect to home page if user is not authenticated
            }

        }

    }