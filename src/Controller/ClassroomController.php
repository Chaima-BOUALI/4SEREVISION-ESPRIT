<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    /**
     * @Route("/classroom", name="classroom")
     */
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }

    /**
     * @return Response
     * @Route ("/afficheclasse",name="afficheclasse")
     */
    public function Affiche(){
        $repo=$this->getDoctrine()->getRepository(Classroom::class);
        $classroom=$repo->findAll();
        return $this->render("classroom/affiche.html.twig",
        ['classrooms'=>$classroom]);
    }

    /**
     * @param $id
     * @Route ("/delete/{id}",name="delete")
     */
  public function delete($id){
        $repo=$this->getDoctrine()->getRepository(Classroom::class);
        $classroom=$repo->find($id);
    $em=$this->getDoctrine()->getManager();
    $em->remove($classroom);
    $em->flush();
      return $this->redirectToRoute('afficheclasse');
  }

    /**
     * @param Request $request
     * @return Response
     * @Route ("classroom/add",name="add")
     */
  public function add(Request $request){
      $classroom = new Classroom();
$form=$this->createForm(ClassroomType::class, $classroom);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()){
    $em=$this->getDoctrine()->getManager();
    $em->persist($classroom);
    $em->flush();
    return $this->redirectToRoute('afficheclasse');
      }
return $this->render('classroom/add.html.twig',['form'=> $form->createView()]);
  }

    /**
     * @param $id
     * @return Response
     * @Route ("classroom/update/{id}",name="update")
     */
    public function update($id , Request  $request)
    {
        $repo = $this->getDoctrine()->getRepository(Classroom::class);
        $classroom = $repo->find($id);
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->add('Update', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficheclasse');
        }
        return $this->render('classroom/update.html.twig', ['form' => $form->createView()]);
    }

}
