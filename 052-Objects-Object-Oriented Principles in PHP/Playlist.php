<?php

    class Playlist
    {


        public function __construct(public $name = "My Favorite Songs", public $songs = [])
        {


        }

        public function shuffle()
        {
            shuffle($this->songs);
        }
        
    }

    $playlist = [];

    $playlist[] = new Playlist("VanCanto Covers", [
        "Master of Puppets",
        "Fear of the Dark",
        "Wishmaster",
        "Hells Bells"
    ]);

    $playlist[] = new Playlist("Epic Metal", [
        "The Bard's Song",
        "A Tale That Wasn't Right",
        "Mirror Mirror",
        "The Last Candle"
    ]);

    foreach ($playlist as $pl) {
        $pl->shuffle();
    }

    var_dump($playlist);
    die();
