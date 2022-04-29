<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;



class Calc
{

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