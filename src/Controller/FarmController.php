<?php

namespace App\Controller;

use DateTime;
use App\Entity\Farm;
use App\Entity\User;
use App\Form\FarmerType;
use App\Repository\FarmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FarmController extends AbstractController
{
    /**
     * @Route("/farm", name="farm")
     * @IsGranted("ROLE_USER")
     */
    public function index(FarmRepository $farmRepository): Response
    {
        $farmcheck = $farmRepository->findAllFarmNotCheck();
        $farmnotcheck = $farmRepository->findAllFarmCheck();
        return $this->render('farm/index.html.twig', [
            'farmchecklist' => $farmcheck,
            'farmnotcheck' => $farmnotcheck,
        ]);
    }
    /**
     * @Route("/farm/add", name="farm_add")
     * @IsGranted("ROLE_USER")
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

        return $this->render('farm/addform.html.twig');
    }

     /**
     * @Route("/farm/{id}/check", name="farm_check")
     * @IsGranted({"ROLE_ADMIN", "ROLE_FARM"})
     */
    public function check(Farm $farm = null): Response
    {
        if(null === $farm)
        {
            throw $this->createNotFoundException('Demande de farm non trouvé.');
        }

        $farm->setCheckOrNot(!$farm->getCheckOrNot());

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de farm archivé.');

        return $this->redirectToRoute('farm');
    }
}
