<?php

class Electric extends Pokemon{
    public function __construct($nazwa, $hp_max, $moc)
    {
        parent::__construct($nazwa, $hp_max, $moc);
        $this->rodzaj = "electric";
        $this->good_against = array("water");
        //$this->weak_against = array("leaf");
    }
}