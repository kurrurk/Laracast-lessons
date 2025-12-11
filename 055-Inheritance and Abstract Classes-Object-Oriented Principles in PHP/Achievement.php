<?php 

    class User {

        public string $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

    }

    abstract class Achievement 
    {

        public function __construct(
            public string $name, 
            public string $description, 
            public string $icon
        ) {
            //
        }

        abstract public function qualifier (User $user);
        
    }

    class FirstPostAchievement extends Achievement 
    {
        public function qualifier (User $user)
        {
            // $user->posts()->count() > 0
        }
    }

    class TalkativeAchievement extends Achievement 
    {
        public function qualifier (User $user)
        {
            // $user->comments()->count() >= 200
        }
    }

    // new Achievement(); // This will cause an error because we cannot instantiate an abstract class.

    $firstPost = new FirstPostAchievement(
        name: "First Post",
        description: "Granted for creating your first post.",
        icon: "first-post.svg"
    );

    echo "\n";
    die();