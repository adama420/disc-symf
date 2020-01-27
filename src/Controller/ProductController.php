<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * On peut passer à la ligne pour gagner en lisibilité.
     *
     * @Route(
     *     "/product/{page}",
     *     name="product_list",
     *     requirements={"page"="\d+"}
     * )
     */
    public function list($page = 1)
    {
        // ...
    }

    /**
     * @Route("/product/{slug}", name="product_show")
     */
    public function show($slug)
    {
        // ...
    }
}