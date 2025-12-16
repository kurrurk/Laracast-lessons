<?php

    // Require the Composer autoloader.
    require 'vendor/autoload.php';

    use Aws\S3\S3Client;

    $s3Key = "YOUR_s3Key";
    $s3Secret = "YOUR_s3Secret";

    $file = 'test.txt';
    $content = 'Hello World!';


    // Instantiate an Amazon S3 client.
    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => 'eu-north-1',
        'credentials' => [
            'key' => $s3Key,
            'secret' => $s3Secret,
        ]
    ]);

    // Upload a publicly accessible file. The file size and type are determined by the SDK.
    try {
        $s3->putObject([
            'Bucket' => 'your-bucket',
            'Key'    => 'test.txt',
            'Body'   => $content,
        ]);
    } catch (Aws\S3\Exception\S3Exception $e) {
        echo "There was an error uploading the file.\n";
    }