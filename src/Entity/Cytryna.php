<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Cytryna extends Owoce
{

    public function __construct()
    {
        $this->kolor='zolty';
        $this->ksztalt='cytrynowy';
        $this->smak='kwasny';
    }
    /**
     * @ORM\Column(type="string")
     */
    private $kwasnosc;

    /**
     * @return mixed
     */
    public function getKwasnosc()
    {
        return $this->kwasnosc;
    }

    /**
     * @param mixed $kwasnosc
     * @return Cytryna
     */
    public function setKwasnosc($kwasnosc)
    {
        $this->kwasnosc = $kwasnosc;
        return $this;
    }

}