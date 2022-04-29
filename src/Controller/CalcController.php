<?php

namespace App\Controller;

use App\Entity\Calc;
use App\Form\Type\CalcType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalcController extends AbstractController
{
    /**
     * @Route ("/calc/new", name="calc_new")
    */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $calc = new Calc();

        $form = $this->createForm(CalcType::class, $calc);
        $form->handleRequest($request);

        if ($calc->isSubmitted() && $calc->isValid()){

        }
    }

}