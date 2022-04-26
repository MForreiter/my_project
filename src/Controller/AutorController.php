<?php

namespace App\Controller;

use App\Entity\Autor;

use App\Form\Type\AutorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutorController extends AbstractController
{
    /**
     * @Route("/autor/new", name="zsl_kocham")

     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $autor = new Autor();
        $form = $this->createForm(AutorType::class, $autor);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($autor);
            $entityManager->flush();
            return $this->redirectToRoute('zsl_id', ['id' => $autor->getId()]);
        }
        return $this->renderForm('zsl/kocham.html.twig', [
            'form' => $form
        ]);

    }
    /**
     * @Route("/autor/id{id}", name="zsl_id")

     */
    public function success($id)
    {
        return $this->render('zsl/id.html.twig', ['id' => $id]);

    }
    /**
     * @Route("/autor/wynik", name="zsl_wynik")

     */
    public function wynik( EntityManagerInterface $entityManager)
    {
        $autorRepository= $entityManager->getRepository(Autor::class);
        $autors=$autorRepository->findAll();
        return $this->render('zsl/wynik.html.twig', ['autors'=>$autors]);




    }


    }

