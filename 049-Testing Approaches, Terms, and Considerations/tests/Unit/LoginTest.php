<?php

    use Core\App;
    use Core\Database;
    use Core\Authenticator;

    it('saves the user email in the session upon login', function () {

        session_status();

        (new Authenticator())->login([ 
            'email' => 'kuremkarmerurk@gmail.com',
        ]);

        expect($_SESSION['user']['email'])->toBe('kuremkarmerurk@gmail.com');

    });