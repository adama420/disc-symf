<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{   
  
    /**
     * @Route("/hello/{slug}", name="hello",
     * requirements={"slug"="\D{3,8}"}
     * 
     * )
     * le requirement va permettre de limiter la saisie a des lettres uniquement avec l'antislash D et le 3,8 limite le nombre de caractères accepetés
     */
    public function show($slug = "Adama le roi d'la roumba")
    {
        return $this->render('welcome/hello.html.twig', [
            'slug' => ucfirst($slug),
        ]);
    }
}