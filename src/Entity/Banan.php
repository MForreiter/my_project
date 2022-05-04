<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */

class Banan extends Owoce
{
    public function __construct()
    {
        $this->kolor = 'zolty';
        $this->ksztalt = 'bananowy';
        $this->smak = 'bananowy';

    }

    /**
     * @return mixed
     */
    public function getKolor()
    {
        return $this->kolor;
    }

    /**
     * @param mixed $kolor
     * @return Owoce
     */
    public function setKolor($kolor)
    {
        $this->kolor = $kolor;
        return $this;
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
     * @return Banan
     */
    public function setKwasnosc($kwasnosc)
    {
        $this->kwasnosc = $kwasnosc;
        return $this;
    }

}