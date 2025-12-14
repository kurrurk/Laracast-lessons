<?php

    class User 
    {
        public public(set) string $email {

            get => str_replace('@','(at)',$this->email);

            set { // set(string $email) also possible
                if(! filter_var($value, FILTER_VALIDATE_EMAIL)){
                    throw new InvalidArgumentException('Email must be valid.');
                }
                $this->email = $value;
            }
        }

        // PHP 8.4.1 
        // For some reason, the example from the video doesn’t work. 
        // As soon as I add a GET variable, it becomes unavailable for editing, even from within the class body.
        public private(set) string $email2;

        public function __construct(string $email)
        {
            $this->email = $email;
            $this->email2 = $email;
        }

        public function setEmail2(string $email) {
            if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new InvalidArgumentException('Email must be valid.');
            }
            $this->email2 = $email;
        }
        
    }

    $user = new User('kuremkarmerurk@gmail.com');

    $user->setEmail2('test@email.com');

    echo "\n";
    echo $user->email . "\n";
    echo $user->email2 . "\n";
    echo "\n";