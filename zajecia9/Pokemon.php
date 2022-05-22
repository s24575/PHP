<?php
require_once("Water.php");
require_once("Fire.php");
require_once("Psychic.php");
require_once("Leaf.php");
require_once("Electric.php");

class Pokemon {
    protected $nazwa, $rodzaj, $hp_max, $hp_aktualne, $moc, $good_against, $weak_against;
    protected $isParalyzed = false, $isConfused = false;
    protected $img;

    public function __construct($nazwa, $hp_max, $moc)
    {
        $this->nazwa = $nazwa;
        $this->hp_max = $hp_max;
        $this->hp_aktualne = $hp_max;
        $this->moc = $moc;
        $this->rodzaj = "";
        $this->good_against = array();
        $this->weak_against = array();
    }

    public function attack(Pokemon $enemy) {
        if($this->isParalyzed && rand(0, 1) == 1){
            $this->isParalyzed = false;
            echo "[!]$this->nazwa is paralyzed and can't attack<br>";
            return;
        }
        $this->isParalyzed = false;
        if($this->isConfused && rand(0, 1) == 1){
            $this->isConfused = false;
            echo "[!]$this->nazwa is confused and attacks itself<br>";
            $this->attack($this);
            return;
        }
        $this->isConfused = false;

        $dmg = $this->moc;
        if(in_array($enemy->rodzaj, $this->good_against)) { $dmg *= 1.2; }
        $enemy->hp_aktualne -= $dmg;
        echo $this->getNazwa() . " attacks for " . $dmg . " damage<br>";

        if($this != $enemy){
            $effect = rand(0, 1);
            if($effect == 0 && rand(0, 1) == 1){ $enemy->isParalyzed = true; echo "Applied Paralazytion<br>"; }
            if($effect == 1 && rand(0, 1) == 1){ $enemy->isConfused = true; echo "Applied Confusion<br>"; }
        }
    }

    public function getNazwa() { return $this->nazwa; }
    public function setNazwa($nazwa) { $this->nazwa = $nazwa; }

    public function getRodzaj() { return $this->rodzaj; }
    public function setRodzaj($rodzaj) { $this->rodzaj = $rodzaj; }

    public function getHpMax() { return $this->hp_max; }
    public function setHpMax($hp_max) { $this->hp_max = $hp_max; }

    public function getHpAktualne() { return $this->hp_aktualne; }
    public function setHpAktualne($hp_aktualne) { $this->hp_aktualne = $hp_aktualne; }

    public function getMoc() { return $this->moc; }
    public function setMoc($moc) { $this->moc = $moc; }

    public function createimage(){
        echo '<span class="bell">';
        echo '<img src='."./img/$this->nazwa.jpg".' alt=alerts>';
        echo '<span class="bellnumbers health '.$this->rodzaj.'">'.$this->hp_aktualne.'</span>';
        echo '<span class="bellnumbers damage">'.$this->moc.'</span>';
        echo '</span><br>';
    }
}