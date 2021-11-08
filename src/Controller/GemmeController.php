<?php

namespace App\Controller;

use App\Repository\GemmeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GemmeController extends AbstractController
{
    /**
     * @Route("/gemme", name="gemme")
     * @IsGranted("ROLE_USER")
     */
    public function index(GemmeRepository $gemmeRepository): Response
    {

        $GemmeFindAll = $gemmeRepository->FindAllSortAtStuff();

        return $this->render('gemme/index.html.twig', [
            'gemmes' => $GemmeFindAll,
        ]);
    }
}
