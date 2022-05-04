<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Truskawka extends Owoce
{



 public function __construct()
 {
     $this->kolor='czerwony';
     $this->ksztalt='truskawkowy';
     $this->smak='Slodki';
 }
    /**
     * @ORM\Column(type="string")
     */
private $slodkosc;
    /**
     * @return mixed
     */
    public function getSlodkosc()
    {
        return $this->slodkosc;
    }

    /**
     * @param mixed $slodkosc
     * @return Truskawka
     */
    public function setSlodkosc($slodkosc)
    {
        $this->slodkosc = $slodkosc;
        return $this;
    }

}