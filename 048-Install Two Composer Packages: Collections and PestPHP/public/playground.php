<?php

    use Illuminate\Support\Collection;

    require __DIR__ . '/../vendor/autoload.php';

    $key = [ 5, 1000]; 

    $numbers =new Collection([1,2,3,4,5,6,7,8,9,10]);

    for ($i = 0; $i < count($key); $i++) {
        if($numbers->contains($key[$i])) {
            echo "{$i}: Die Sammlung enthält die Zahl {$key[$i]} \n";
        } else {
            echo "{$i}: Die Sammlung enthält die Zahl {$key[$i]} nicht \n";
        }
    }

    $lessOrEqualToFive = $numbers->filter(function ($number) {

        return $number <= 5;

    });

    var_dump( $lessOrEqualToFive);

    die("Das war's!"."\n");

    // $numbers->map(fn($number) => $number * 2)->all()