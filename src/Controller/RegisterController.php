<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManger){
        $this->entityManager = $entityManger;
    }

    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class);

        //Method listening when the form is injected.
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            //Storing information in User entity
            $user = $form->getData();

            //Storing registered user in the DB.
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}