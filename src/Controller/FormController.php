<?php

namespace App\Controller;

use Symfony\Component\Validator;
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

            $liczba = str_split($form->getPesel());
            $suma = $liczba[0] * 1 + $liczba[1] * 3 + $liczba[2] * 7 + $liczba[3] * 9 + $liczba[4] * 1 + $liczba[5] * 3 + $liczba[6] * 7 + $liczba[7] * 9 + $liczba[8] * 1 + $liczba[9] * 3 + $liczba[10] * 1;
            $day = ($form->getDate()->format('d'));
            $month =($form->getDate()->format('m'));
            $year = ($form->getDate()->format('y'));
            $fullyear = ($form->getDate()->format('Y'));
            $xyz=0;
            if($fullyear>=1800 && $fullyear<=1899){
                $xyz=80;
            }
            elseif($fullyear>=2000 && $fullyear<=2099){
                $xyz=20;
            }
            elseif($fullyear>=2100 && $fullyear<=2199){
                $xyz=40;
            }
            elseif($fullyear>=2200 && $fullyear<=2299){
                $xyz=60;
            }
            $month= $month+ $xyz;



            if ($suma % 10 == 0) {
                if(($liczba[9]%2==0 && $form->getSEX()=='woman') || ($liczba[9]%3==0 && $form->getSEX()=='man')){

                    if($day==$liczba[4].$liczba[5] && $month==$liczba[2].$liczba[3] && $year == $liczba[0].$liczba[1]){
                $entityManager->persist($form);
                $entityManager->flush();
                return $this->redirectToRoute('form_success', ['id' => $form->getId()]);
            }
                else {
                    return $this->redirectToRoute('form_new',  ['error'=>'nieprawidłowy data']);
                }
                }
                else {
                    return $this->redirectToRoute('form_new',  ['error'=>'nieprawidłowy pesel']);
                }

        }
            else {

                return $this->redirectToRoute('form_new',  ['error'=>'nieprawidłowy pesel']);

            }
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
        $formRepository = $entityManager->getRepository(Form::class);
        $forms = $formRepository->findAll();

        return $this->render('form/all.html.twig', ['forms' => $forms]);


    }

}