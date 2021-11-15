<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReunionController extends AbstractController
{
    /**
     * @Route("/reunion", name="reunion")
     */
    public function index(NewsRepository $newsRepository): Response
    {
        $reunion = $newsRepository->findAll();

        return $this->render('reunion/index.html.twig', [
            'reunion' => $reunion,
        ]);
    }

    /**
     * @Route("/reunion/{id}", name="reunion_resume")
     */
    public function details(News $news): Response
    {
        if ($news === null) {
            throw $this->createNotFoundException('Film non trouvé.');
        }
        return $this->render('reunion/resume.html.twig', [
            'reunion' => $news,
        ]);
    }
}
