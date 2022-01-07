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

    /**
     * @return Response
     * @Route ("/liste", name="liste")
     */
    public function Liste(){
        $formations = array (
            array('ref' => 'form1', 'Titre' => 'Formation Symfony 4', 'Description' => 'Formation Théorique et Pratique'
            , 'Date_Debut' => '20/10/2020', 'Date_fin' => '21/12/2020', 'Nombre_Participants' => '10'),
             array('ref' => 'form2', 'Titre' => 'Formation SOA ', 'Description' => 'Formation Théorique '
             , 'Date_Debut' => '01/01/2021', 'Date_fin' => '01/03/2021', 'Nombre_Participants' => '0'),
            array('ref' => 'form3', 'Titre' => 'Formation SpringBoot', 'Description' => 'Formation  Pratique'
            , 'Date_Debut' => '20/10/2022', 'Date_fin' => '21/12/2022', 'Nombre_Participants' => '20')
        );
        return $this->render("club/liste.html.twig", ['formations' => $formations]);
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
     public function Details($id){
        return $this->render("club/detail.html.twig" , ['ref'=>$id]);
     }
}
