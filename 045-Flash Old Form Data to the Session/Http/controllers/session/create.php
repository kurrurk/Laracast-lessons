<?php

    use Core\Session;

    view('session/create.view.php', [

        'heading' => 'Login-Seite',
        'errors' => Session::get('errors')
        
    ]);