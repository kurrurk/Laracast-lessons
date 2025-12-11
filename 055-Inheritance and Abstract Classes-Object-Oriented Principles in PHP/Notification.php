<?php

    class Notification {

        public function __construct(public string $message)
        {
            //
        }

        public function send()  {

            echo "Show pop up flash message.\n";          
            
        }

    }

    class EmailNotification extends Notification {

        public function send()  {

            echo "Fire off an email notification.\n";          
            
        }

    }
    class OSNotification extends Notification {

        public function send()  {

            echo "Dispatch OS-specific notification.\n";          
            
        }

    }

    $notification = new EmailNotification("You have a new message.");

    echo "\n";

    echo $notification->send();

    echo "\n";