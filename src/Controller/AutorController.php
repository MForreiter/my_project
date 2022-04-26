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

    $form=$this->createForm(AutorType::class, $autor);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){

        $entityManager->persist($autor);
        $entityManager->flush();
        return $this->redirectToRoute('zsl_success',['id'=>$autor->getName()]);
    }
    return $this->renderForm('zsl/new.html.twig', [
        'form'=>$form
    ]);
    }
    /**
     * @Route("/zsl/success/{id}", name="zsl_success")


     */
    public function success($id)
    {

        return $this->render('zsl/success.html.twig', ['id' => $id]);

    }

    /**
     * @Route("/zsl/all", name="zsl_all")

     */
    public function all( EntityManagerInterface $entityManager)
    {
        $autorRepository= $entityManager->getRepository(Autor::class);
        $autors=$autorRepository->findAll();
        dump($autors);
        return $this->render('zsl/all.html.twig', ['autors'=>$autors]);





    }



    }




