<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo")
     */
    public function index(Request $request)
    {
        //récupérer $_GET A

        dump($request->query->get('A'));

        //récupérer IP utilisateur

        dump($request->server->get('REMOTE_ADDR'));
        
        return $this->render('demo/index.html.twig', [
            'controller_name' => 'DemoController',
        ]);
    }

    /**
     * @Route("/toto", name="toto")
     */
    public function toto()
    {
        return $this->redirectToRoute('demo');
    }

    /**
     * @Route("/event/{slug}", name="event")
     */
    public function showEvent(Request $request, $slug, LoggerInterface $logger)
    {
        $events = ['a','b','c'];

        if(!in_array($slug, $events)){
            throw $this->createNotFoundException('Cet evenement n\'existe pas');
        }

        $ip = $request->server->get('REMOTE_ADDR');
        $logger->info($ip. 'a vu l\'événement '.$slug);

        return new Response('<body>'.$slug.'</body>');
    }

    /**
     * On va créér  deux nouvelles routes:
     * /voir-session affiche le contenu de la clé name, n'affiche rien lors de la première visite
     * /mettre-en-session/{name} mettre en session la valeur passée dans l'URL
     */

    /**
     * @Route("/voir-session", name="show_session")
     */ 
    public function showSession(SessionInterface $session) 
    {
        dump($session->get('name'));
        return $this->render('demo/show_session.html.twig');
    }



    /**
     * @Route("/mettre-en-session/{name}", name="put_session")
     */
    public function putSession($name, SessionInterface $session)
    {
        //je mets name dans la session
        $session->set('name', $name);

        //je redirige
        return $this->redirectToRoute('show_session');
    }

}
