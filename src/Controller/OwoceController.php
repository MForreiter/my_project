<?php

namespace App\Controller;
use App\Entity\Owoce;
use App\Entity\Truskawka;
use App\Entity\Cytryna;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OwoceController extends  AbstractController
{
    /**
     * @Route("/owoce", name="owoce")
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    public function Owoce(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $Cytryna = new Cytryna();
        $Truskawka = new Truskawka();
        $Truskawka->setSlodkosc('bardzo słodka');
        $Cytryna->setKwasnosc('Dosc kwasna');


        $entityManager->persist($Truskawka);
        $entityManager->persist($Cytryna);
        $entityManager->flush();

        return new Response('Saved ');
    }


}