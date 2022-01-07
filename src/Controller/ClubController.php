<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
/**
 * @Route("/AfficheFromClub",name="AfficheFromClub")
 */
    public function Affiche1(): Response{
        return new Response("Bonjour From Club");
    }

    /**
     * @param $club
     * @return Response
     * @Route("/AfficheFromClub/{club}", name="AfficheFromClubbyClub")
     */
    public function AfficheFromClubParam($club){
        return $this->render("club/AfficheFromClub.html.twig",
        ['c'=> $club]);
    }

    /**
     * @param $nom
     * @Route("/getName/{nom}/{club}", name="getName")
     */
    public function getName($nom , $club){
return $this->render("club/detail.html.twig",
['n'=> $nom, 'c'=>$club]);
    }
}
