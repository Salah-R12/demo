<?php

namespace App\Controller;
use App\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice("1999");


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

       // return new Response('Saved new product with id '.$product->getId());

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

/**
* @Route("/product/{id}", name="product_show")
*/

    public function show($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);
       // dd($product);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

       // return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
       return $this->render('product/show.html.twig', ['product' => $product,'controller_name' => 'ProductController']);
    }

}
