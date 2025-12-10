<?php

    class Playlist
    {

        /**
         * Summary of __construct
         * @param string $name
         * @param Song[] $songs
         */
        public function __construct(
            public string $name = "My Favorite Songs", 
            public array $songs = []
        ){}
        
    }
    
    class Song
    {
        /**
         * Summary of __construct
         * @param string $name
         * @param string $artist
         * @param int $year
         */
        public function __construct(
            public string $name,
            public string $artist,
            public int $year
        ){}

    }

    $songs = [
        new Song("The Touch", "Stan Bush", 1986),
        new Song("Dare", "Stan Bush", 1986),
        new Song("Dare to be Stupid", "“Weird Al” Yankovic", 1986),
        new Song("Instruments of Destruction", "N.R.G.", 1986),
        new Song("Nothin's Gonna Stand in Our Way", "Spectre General", 1986)
    ];

    $playlist = new Playlist("Transformers The Movie Soundtrack", $songs);

    var_dump($playlist->songs[0]->artist);

    echo "\n";
    die();
