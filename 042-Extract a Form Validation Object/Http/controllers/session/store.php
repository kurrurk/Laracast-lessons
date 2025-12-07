<?php

    use Core\App;
    use Core\Validator;
    use Core\Database;
    use Http\Forms\LoginForm;

    // log in the user if the credentials match.

    $db = App::resolve(Database::class);

    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate the form inputs.
    $form = new LoginForm();

    if ( !$form->validate($email, $password) ) {
        
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
   


    