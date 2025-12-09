<?php

    use Core\Authenticator;
    use Http\Forms\LoginForm;

    //validate the form inputs.
    
    $form = LoginForm::validate($attributes = [

        'email' => $_POST['email'], 
        'password' => $_POST['password']

    ]);

    $signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

    if(!$signedIn) {
        $form->error(
            'email', 'Email-Adresse oder Passwort ist ungültig.'
        )->throw();
    }    

    redirect('/');     
