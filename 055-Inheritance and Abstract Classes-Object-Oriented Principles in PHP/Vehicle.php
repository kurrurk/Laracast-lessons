<?php

    class Vehicle {

        public string $typ = "Vehicle";

        public function accelerate() {
            echo "The {$this->typ} is accelerating.\n";
        }
    }

    class Cart extends Vehicle {
        public string $typ = "Cart";

        public function accelerate() {
            echo "The {$this->typ} is rolling.\n";
        }
    }

    class Truck extends Vehicle {
        public string $typ = "Truck";
    }

    echo "\n";

    (new Cart())->accelerate();
    (new Truck())->accelerate();

    echo "\n";