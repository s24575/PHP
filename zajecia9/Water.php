<?php

class Water extends Pokemon{
    public function __construct($nazwa, $hp_max, $moc)
    {
        parent::__construct($nazwa, $hp_max, $moc);
        $this->rodzaj = "water";
        $this->good_against = array("fire");
        //$this->weak_against = array("electric", "leaf");
    }
}