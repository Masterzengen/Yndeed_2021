<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offres;

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
        return $this->render(
            'yndeed/home.html.twig',
            ['title' => "Salutations!"]
        );
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
}
