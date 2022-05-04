<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;
use function Symfony\Component\DependencyInjection\Loader\Configurator\abstract_arg;

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
    public $id;
    /**
     * @ORM\Column(type="string")
     */
public string $kolor;
    /**
     * @ORM\Column(type="string")
     */
public string $smak;
    /**
     * @ORM\Column(type="string")
     */
public string $ksztalt;










}