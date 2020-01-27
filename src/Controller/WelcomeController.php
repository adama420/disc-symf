<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{   
    /**
     * @Route("/hello", name="hello")
     */

    public function hello()
    {
        $name = "Adama le roi d'la roumba";

        dump($name);

        return $this->render('welcome/hello.html.twig', [
            'name' => $name,
        ]);
    }
}