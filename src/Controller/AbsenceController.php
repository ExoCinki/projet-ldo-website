<?php

namespace App\Controller;

use App\Entity\Absence;
use App\Form\AbsenceFormType;
use App\Repository\AbsenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbsenceController extends AbstractController
{
    /**
     * @Route("/absence", name="absence")
     */
    public function index(AbsenceRepository $absenceRepository): Response
    {
        $absence = $absenceRepository->findAll();
        return $this->render('absence/index.html.twig', [
            'absence' => $absence,
        ]);
    }

    /**
     * @Route("/absence/add", name="absence_add")
     * @IsGranted("ROLE_USER")
     */
    public function add(Request $request): Response
    {
        $user = $this->getUser();
        $absence = new Absence();
        $absence->setName($user->getPseudo());
        $formabsence = $this->createForm(AbsenceFormType::class, $absence);
        $formabsence->handleRequest($request);
        


        if ($formabsence->isSubmitted() && $formabsence->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($absence);
            $entityManager->flush();

            return $this->redirectToRoute('absence');
        }

        return $this->render('absence/addform.html.twig',['formabsence' => $formabsence->createView()]);
    }
}
