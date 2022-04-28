<?php

namespace App\Controller;
use App\Entity\Form;
use App\Form\Type\FormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form/new", name="form_new")

     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = new Form();

        $form1 = $this->createForm(FormType::class, $form);
        $form1->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {

            $entityManager->persist($form);
            $entityManager->flush();
            return $this->redirectToRoute('form_success', ['id' => $form->getId()]);
        }
        return $this->renderForm('form/new.html.twig', [
            'form' => $form1
        ]);
    }
    /**
     * @Route("/form/success/{id}", name="form_success")

     */
    public function success($id)
    {
        return $this->render('form/success.html.twig', ['id' => $id]);

    }

    /**
     * @Route("/form/all", name="form_all")
     */
    public function all(EntityManagerInterface $entityManager)
    {
        $formResponsitory=$entityManager->getRepository(Form::class);
        $forms=$formResponsitory->findAll();
        return $this->render('form/all.html.twig', ['forms'=>$forms]);
    }
}