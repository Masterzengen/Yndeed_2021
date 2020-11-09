<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YndeedController extends AbstractController
{
    /**
     * @Route("/offres", name="offres")
     */
    public function index(): Response
    {
        return $this->render('yndeed/offres.html.twig', [
            'controller_name' => 'YndeedController',
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
}
