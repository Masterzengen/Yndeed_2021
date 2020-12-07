<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Offres;
use App\Form\OffreType;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class YndeedController extends AbstractController
{
    /**
     * @Route("/offres", name="offres")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Offres::class);
        $offres = $repo->findAll();
        //dd($offres);

        return $this->render('yndeed/offres.html.twig', [
            'controller_name' => 'YndeedController',
            'offres' => $offres
        ]);
    }

    /**
     * @Route("/", name="home")
     */

    public function home()
    {
        $repo = $this->getDoctrine()->getRepository(Offres::class);
        $offres = $repo->findAll();
        return $this->render('yndeed/home.html.twig',
            ['title' => "Yndeed",
            'offres' => $offres
        ]);
    }

    /**
     * @Route ("/offres/{id}", name="offreShow")
     */

    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Offres::class);
        $offre = $repo->find($id);
        return $this->render('yndeed/show.html.twig', [
            'offre' => $offre
        ]);
    }

     /**
     * @Route ("/offres/postuler/{id}", name="postuler")
     */

    public function postuler($id){
        $repo = $this->getDoctrine()->getRepository(Offres::class);
        $offre = $repo->find($id);
        return $this->render('yndeed/postuler.html.twig',[
            'offre'=> $offre
        ]);
    }

    /**
     * @Route ("/ajouter", name="ajouter")
     * @Route ("/editer/{id}", name ="edit")
     */

     public function ajouter(Offres $offre = null, Request $request, EntityManagerInterface $em){
         if(!$offre){
            $offre = new Offres(); 
         }
         

         $form = $this->createForm(OffreType::class, $offre);

         $form->handleRequest($request);

        if($form->isSubmitted()){
            $offre->setDateDeCreation(new \DateTime());
            $offre->setDateDeMiseAJour(new \DateTime());
            $em->persist($offre);
            $em->flush();
            return $this->redirectToRoute('offreShow',['id'=>$offre->getId()]);
        }


         return $this->render('yndeed/ajouter.html.twig',[
             "form" => $form->createView()
         ]);



     }



}
