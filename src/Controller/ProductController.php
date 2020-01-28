<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class ProductController extends AbstractController
{
    private $products = [];
    public function __construct()
    {
        $this->products = [
            ['name' => 'iPhone X', 'slug' => 'iphone-x', 'description' => 'Un iPhone de 2017', 'price' => 999, 'image'=>'https://d1kvfoyrif6wzg.cloudfront.net/assets/images/63/main/none_b6754a1786d0b849ad21fccf61ae81a4_b6754a1.PNG'],
            ['name' => 'iPhone XR', 'slug' => 'iphone-xr', 'description' => 'Un iPhone de 2018', 'price' => 1099, 'image'=>'https://images.frandroid.com/wp-content/uploads/2019/04/iphone-xr-2018.png'],
            ['name' => 'iPhone XS', 'slug' => 'iphone-xs', 'description' => 'Un iPhone de 2019', 'price' => 1199, 'image'=>'https://images.frandroid.com/wp-content/uploads/2019/04/iphone-xs-2018.png']
        ];
    }

    /**
     * @Route("/product/random", name="product_rand")
     */
    public function rand()
    {
        $i = rand(0,2);

        return $this->render('Products/productrand.html.twig', [
            'product1' => $this->products[$i]

        ]);
        
    }

    /**
     * @Route(
     *     "/product",
     *     name = "product_list")
     */
    public function list()
    {
        return $this->render('Products/products.html.twig', [
            'products' => $this->products

        ]

        );
    }
    
    /**
     * @Route("/product/create", name="product_create")
     */
    public function create()
    {
        return $this->render('Products/productcreate.html.twig');
    }

    /**
     * @Route("/product/{slug}", name="product_show")
     */
    public function show($slug)
    {
        
        foreach($this->products as $product){
            
            if($slug === $product['slug']){
                return $this->render('Products/productslug.html.twig', [
                    'product' => $product
        
                ]);  
            } 

            
        } throw $this->createNotFoundException('Cet produit n\'existe pas');

          
    }

    
}