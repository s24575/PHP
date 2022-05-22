<?php

require_once("Pokemon.php");
class Walka{
    private $pokemon1;
    private $pokemon2;

    public function __construct($pokemon1, $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
        echo "Start the fight!<br> ";
        $this->walcz();
    }


    public function walcz(){
        $attacker = $this->pokemon1;
        $enemy = $this->pokemon2;
        while(true) {
            $attacker->attack($enemy);
            $this->printStats();
            if($enemy->getHpAktualne() <= 0){
                echo $attacker->getNazwa() . " wins!<br>";
                return;
            }

            $tmp = $attacker;
            $attacker = $enemy;
            $enemy = $tmp;
        }
    }

    public function printStats(){
        $this->pokemon1->createimage();
        $this->pokemon2->createimage();
    }
}