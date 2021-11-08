<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @IsGranted("ROLE_USER")
     */
    public function index(NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->findAll();

        return $this->render('home/index.html.twig', [
            'news' => $news,
        ]);
    }
}
