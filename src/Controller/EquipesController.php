<?php

namespace App\Controller;

use App\Entity\Equipes;
use App\Repository\EquipesRepository;
use App\Form\EquipesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EquipesController extends AbstractController
{

    /**
     * @var EquipesRepository
     */
    private $Repository;

    public function __construct(EquipesRepository $repository)
    {
        $this->repository=$repository;      
    }




    /**
     * @Route("/equipes/liste", name="nos_equipes")
     */
    public function indexAction()
    {
        $equipes=$this->repository->findAll();
        return $this->render('equipes/liste.html.twig', [
            'equipes' => $equipes,
        ]);
    }


    /**
    *@Route("editer/equipe", name="equipes_creer")
    *
    */
    public function creer(Request $request)
    {
        $equipes = new Equipes();
        $form =  $this->createForm(EquipesType::class, $equipes);
       
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $equipes = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($equipes);
         $entityManager->flush();

        return $this->redirectToRoute('nos_equipes');
        }

        return $this->render('equipes/creer.html.twig', [
            'form' =>$form->createView() 
        ]);
    }



     /**
     * @Route("/equipe/modifier/{id}", name="equipes_modifier", methods="GET|POST")
     */
    public function modification(Request $request, Equipes $equipes)
    {
       
       $form =$this->createForm(EquipesType::class, $equipes);
       
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $equipes = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $entityManager = $this->getDoctrine()->getManager();
         //$entityManager->persist($mobilier);
         $entityManager->flush();
         $this->addFlash('success', 'Information de l\'equipes modifier avec succès');            

        return $this->redirectToRoute('nos_equipes');
        }

        return $this->render('equipes/modifier.html.twig', [
            'form' =>$form->createView() 
        ]);
    }


               /**
     * @Route("/equipes/suprimer/{id}", name="equipes_supprimer")
     */
       public function supprimer(Equipes $equipes)
       {
           $em= $this->getDoctrine()->getManager();
           $em->remove($equipes);
           $em->flush();
           return $this->redirectToRoute('nos_equipes');

       }




}
