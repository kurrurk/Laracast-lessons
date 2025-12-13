<?php

    class Person 
    {

        public function __construct(public string $name)
        {
            //
        }

        public function job()
        {
            return "$this->name is a web developer.";
        }

        public function favoriteTeam()
        {
            return "{$this->name}'s favorite team is Schalke.";
        }

        private function thingsThatKeepUpNight()
        {

            return "{$this->name} is afraid of dying";

        }
        
    }


    $person = new Person('Bob');

    echo "\n";
    var_dump($person->job());
    echo "\n";