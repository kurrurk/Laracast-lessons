<?php

    interface CanBeLiked 
    {
        public function like();
        public function isLiked();
    }

    class Comment implements CanBeLiked
    {
        
        public function like() {
            echo "You liked the comment.\n";
        }

        public function isLiked() {

            echo "Comment is already liked.\n";
            return true;
        }

    }

    class Post implements CanBeLiked
    {
        
        public function like() {
            echo "You liked the post.\n";
        }

        public function isLiked() {
            return false;
        }

    }

    class Thread implements CanBeLiked
    {
        
        public function like() {
            echo "You liked the thread.\n";
        }

        public function isLiked() {
            return false;
        }

    }

    class PerformLike 
    {

        public function handle(CanBeLiked $model)
        {
            if ( $model->isLiked() ) {
                return;
            } 

            $model->like();
        }    

    }

    echo "\n";
    (new PerformLike())->handle( new Comment() );
    (new PerformLike())->handle( new Post() );
    (new PerformLike())->handle( new Thread() );
    echo "\n";