<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarController extends AbstractController
{
    /**
     * @Route("/war", name="war")
     */
    public function index(): Response
    {
        return $this->render('war/index.html.twig', [
            'controller_name' => 'WarController',
        ]);
    }
}
