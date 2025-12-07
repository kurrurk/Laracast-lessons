<?php

    use Core\App;
    use Core\Validator;
    use Core\Database;

    // log in the user if the credentials match.

    $db = App::resolve(Database::class);

    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate the form inputs.
    $errors = [];
    if ( !Validator::email($email) ) {
        $errors['email'] = 'Bitte geben Sie eine gültige E-Mail Adresse an.';
    }

    if ( !Validator::string($password) ) {
        $errors['password'] = 'Bitte geben Sie ein gültiges Passwort ein.';
    }

    if ( !empty($errors) ) {
        view('session/create.view.php', [
            'heading' => 'Login-Seite',
            'errors' => $errors
        ]);
    }

    //match the credentials

    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->find();

    if($user) {

        if (password_verify($password, $user['password'])) {
            login([
                'email' => $email,
            ]);
            header('location: /');
            exit();
        }
        
    }
  
    return view('/session/create.view.php', [
        'heading' => 'Login-Seite',
        'errors' => [
            'email' => 'Keine Konten mit dieser E-Mail-Adresse gefunden.'
        ]
    ]);
   


    