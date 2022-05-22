<?php

class Fire extends Pokemon{
    public function __construct($nazwa, $hp_max, $moc)
    {
        parent::__construct($nazwa, $hp_max, $moc);
        $this->rodzaj = "fire";
        $this->good_against = array("leaf");
        //$this->weak_against = array("water");
    }
}