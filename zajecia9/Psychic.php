<?php

class Psychic extends Pokemon{
    public function __construct($nazwa, $hp_max, $moc)
    {
        parent::__construct($nazwa, $hp_max, $moc);
        $this->rodzaj = "psychic";
        $this->good_against = array("electric");
        //$this->weak_against = array("lightning", "leaf");
    }
}