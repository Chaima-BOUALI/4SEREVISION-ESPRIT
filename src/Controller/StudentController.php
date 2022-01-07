<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/Affiche", name="Affiche")
     */
    public function Affichage(): Response
    {
        return new Response("Bonjour à tous");
    }

    /**
     * @param $Name
     * @return Response
     * @Route("/AfficheN/{Name}",name="AfficheN")
     */
    public function AffichageName ($Name) {
        return $this->render("student/affiche.html.twig",
        ['n'=> $Name]);
    }
}
