<?php

class Leaf extends Pokemon{
    public function __construct($nazwa, $hp_max, $moc)
    {
        parent::__construct($nazwa, $hp_max, $moc);
        $this->rodzaj = "leaf";
        $this->good_against = array("psychic");
        //$this->weak_against = array("lightning", "leaf");
    }
}