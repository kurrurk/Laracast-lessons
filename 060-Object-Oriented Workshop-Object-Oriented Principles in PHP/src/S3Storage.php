<?php

    namespace App;

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    class S3Storage implements FileStorage
    {

        public function __construct(protected S3Client $s3_client, protected string $bucket)
        {
            //
        }

        public function put(string $path, string $content): void
        {


            // Upload a publicly accessible file. The file size and type are determined by the SDK.
            try {
                $this->s3_client->putObject([
                    'Bucket' => $this->bucket,
                    'Key'    => $path,
                    'Body'   => $content,
                ]);
            } catch (S3Exception $e) {
                echo "There was an error uploading the file.\n";
            }
        }

    }