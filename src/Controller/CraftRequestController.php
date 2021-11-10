<?php

namespace App\Controller;

use DateTime;
use App\Entity\CraftRequest;
use App\Form\ResquestFarmFormType;
use App\Repository\CraftRequestRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CraftRequestController extends AbstractController
{
    /**
     * @Route("/craftrequest", name="craft_request")
     * @IsGranted("ROLE_USER")
     */
    public function index(CraftRequestRepository $CraftRequestRepository): Response
    {
        $craftcheck = $CraftRequestRepository->findAllCraftNotCheck();
        $craftnotcheck = $CraftRequestRepository->findAllCraftCheck();
        return $this->render('craft_request/index.html.twig', [
            'craftchecklist' => $craftcheck,
            'craftnotcheck' => $craftnotcheck,
        ]);
    }
    /**
     * @Route("/craftrequest/add", name="craft_request_add")
     * @IsGranted("ROLE_USER")
     */
    public function add(Request $request): Response
    {
        $user = $this->getUser();
        $craft = new CraftRequest();
        $craft->setCheckOrNot(false);
        $craft->setCreatedAt(new DateTime());
        $craft->setNameUser($user->getPseudo());
        $formcraft = $this->createForm(ResquestFarmFormType::class, $craft);
        $formcraft->handleRequest($request);
        


        if ($formcraft->isSubmitted() && $formcraft->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($craft);
            $entityManager->flush();

            return $this->redirectToRoute('craft_request');
        }

        return $this->render('craft_request/addform.html.twig',['formcraft' => $formcraft->createView()]);
    }

     /**
     * @Route("/craftrequest/{id}/check", name="craft_request_check")
     * @IsGranted("ROLE_CRAFT")
     */
    public function check(CraftRequest $CraftRequest = null): Response
    {
        if(null === $CraftRequest)
        {
            throw $this->createNotFoundException('Demande de Craft non trouvé.');
        }
        
        $CraftRequest->setCheckOrNot(!$CraftRequest->getCheckOrNot());

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de Craft archivé.');

        return $this->redirectToRoute('craft_request');
    }

     /**
     * @Route("/craftrequest/{id}/loading", name="craft_request_loading")
     * @IsGranted("ROLE_CRAFT")
     */
    public function loading(CraftRequest $CraftRequest = null): Response
    {
        $user = $this->getUser();
        if(null === $CraftRequest)
        {
            throw $this->createNotFoundException('Demande de Craft non trouvé.');
        }
        if($CraftRequest->getFarmeur() === null){
            $CraftRequest->setFarmeur($user->getPseudo());
        }else{
            $this->addFlash('danger', 'Cette demande est déjà prise.');
        }
        

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de Craft archivé.');

        return $this->redirectToRoute('craft_request');
    }
}
