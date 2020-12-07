<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/inscription", name="Inscription")
     */
    public function register(): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('login/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
