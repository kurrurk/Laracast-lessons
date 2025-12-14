<?php

    class User 
    {

        public function __construct(private string $email)
        {
            //
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail(string $email)
        {
            if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new InvalidArgumentException('Email must be valid.');
            }
            $this->email = $email;
        }
        
    }

    $user = new User('kuremkarmerurk@gmail.com');

    $user->setEmail('test@email.com');

    echo "\n";
    echo $user->getEmail() . "\n";
    echo "\n";