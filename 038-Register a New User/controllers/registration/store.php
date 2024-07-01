<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs.
$errors = [];
if ( !Validator::email($email) ) {
    $errors['email'] = 'Bitte geben Sie eine gültige E-Mail Adresse an.';
}

if ( !Validator::string($password, 5, 255) ) {
    $errors['password'] = 'Falsche Passwortlänge.';
}

if ( !empty($errors) ) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account allready exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // then someone with that email areadey exist and has account
    // if yes, redirect to a login page.
    header('location: /');
} else {
    // if not, save one to the database, and then log the user in, and redirect
    $db->query('insert into users(email, password) values(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    //mark that the user has logged in
    //$_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('location: /');
    exit();
}

