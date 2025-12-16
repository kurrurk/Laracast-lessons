<?php

    require 'vendor/autoload.php';

    use App\LocalStorage;
    use App\S3Storage;
    use App\Storage;
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();


    $message = 'Message number ('. rand(3, 60) . ')';

    // $storageLocal->put('file.txt', $message);
    // $storageS3->put('file.txt', $message);
    
    Storage::resolve()->put('hello.txt', $message);

    echo "\n";
    if ($_ENV['FILE_STORAGE'] === 'local') {
        echo "$message has been saved locally.\n";
    } else {
        echo "$message has been uploaded to an Amazon S3 bucket.\n";
    }    
    echo "\n";