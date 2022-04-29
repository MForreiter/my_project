<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Calc
{
    /**
     * @ORM\Column(type="string")
     */
    private $calculations;


    /**
     * @return mixed
     */
    public function getCalculations()
    {
        return $this->calculations;
    }

    /**
     * @param mixed $calculations
     * @return Calc
     */
    public function setCalculations($calculations)
    {
        $this->calculations = $calculations;
        return $this;
    }
}