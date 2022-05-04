<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Banan;
use App\Entity\Owoce;
use App\Entity\Truskawka;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OwoceController extends AbstractController
{
    /**
     * @Route("/owoce", name="owoce")
     * @param ManagerRegistry $doctrine)
     * @return Response
     */
    public function Owoce(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $banan = new Banan();
        $truskawka = new Truskawka();

        $truskawka->setSlodkosc('Bardzo slodkie');
        $banan->setKwasnosc('w sumie slodki jednak');

        $entityManager->persist($banan);
        $entityManager->persist($truskawka);

        $entityManager->flush();

        return new Response('saved');
    }
}