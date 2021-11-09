<?php

namespace App\Controller;

use App\Entity\Farm;
use App\Entity\User;
use App\Form\FarmerType;
use App\Repository\FarmRepository;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FarmController extends AbstractController
{
    /**
     * @Route("/farm", name="farm")
     */
    public function index(FarmRepository $farmRepository): Response
    {
        $farm = $farmRepository->findAll();
        return $this->render('farm/index.html.twig', [
            'farmlist' => $farm,
        ]);
    }
    /**
     * @Route("/farm/add", name="farm_add")
     */
    public function add(Request $request): Response
    {
        $farm = new Farm();
        $farm->setCheckOrNot(false);
        $farm->setCreatedAt(new DateTime());
        $form = $this->createForm(FarmerType::class, $farm);
        $form->handleRequest($request);
        


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($farm);
            $entityManager->flush();

            return $this->redirectToRoute('farm');
        }

        return $this->render('farm/addform.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
