<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\MappedSuperclass()
 */

abstract class Owoce
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    public string $kolor;

    /**
     * @ORM\Column(type="string")
     */
    public string $ksztalt;

    /**
     * @ORM\Column(type="string")
     */
    public string $smak;

}