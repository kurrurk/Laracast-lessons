<?php

    use Core\Authenticator;
    use Core\Session;
    use Http\Forms\LoginForm;

    // log in the user if the credentials match.

    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate the form inputs.
    $form = new LoginForm();

    if ( $form->validate($email, $password) ) {

        if((new Authenticator)->attempt($email, $password)) {
            redirect('/');
        }
            
        $form->error('email', 'Email-Adresse oder Passwort ist ungültig.');

    }

    // PRG Pattern: Store errors in session and redirect
    
    Session::flash('errors', $form->errors());
    Session::flash('old', ['email' => $email]);
   
    redirect('/login');


    