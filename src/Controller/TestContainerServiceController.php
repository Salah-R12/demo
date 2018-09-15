<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestContainerServiceController extends AbstractController
{
    /**
     * @Route("/test/container/service", name="test_container_service")
     */
    public function index()
    {
        return $this->render('test_container_service/index.html.twig', [
            'controller_name' => 'TestContainerServiceController',
        ]);
    }
}
