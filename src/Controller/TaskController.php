<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TaskController extends AbstractController
{
    /**
     * @Route("/task/new", name="task_new")

     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('task_success', ['id' => $task->getId()]);
        }
        return $this->renderForm('task/new.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("/task/success/{id}", name="task_success")

     */
    public function success($id)
    {
        return $this->render('task/success.html.twig', ['id' => $id]);

    }

    /**
     * @Route("/task/all", name="task_all")

     */
    public function all( EntityManagerInterface $entityManager)
    {
        $taskRepository= $entityManager->getRepository(Task::class);
        $tasks=$taskRepository->findAll();
        //dump ($tasks);
        return $this->render('task/all.html.twig', ['tasks'=>$tasks]);




    }

}