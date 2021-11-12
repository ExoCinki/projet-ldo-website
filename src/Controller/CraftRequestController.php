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
        $craftcheck = $CraftRequestRepository->findAllCraftCheck();
        $craftnotcheck = $CraftRequestRepository->findAllCraftNotCheck();
        // dd($craftcheck);
        return $this->render('craft_request/index.html.twig', [
            'craftchecklist' => $craftcheck,
            'craftnotcheck' => $craftnotcheck,
        ]);
       
    }

    /**
     * @Route("/craft/add", name="craft_add")
     * @IsGranted("ROLE_USER")
     */
    public function add(Request $request): Response
    {
        $user = $this->getUser();
        $craft = new CraftRequest();
        $craft->setCheckOrNot('En attente de validation');
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
     * @Route("/craft/{id}/refuser", name="craft_trade_refuser")
     * @IsGranted("ROLE_CRAFT")
     */
    public function commandrefuser(CraftRequest $craft = null): Response
    {
        
        $craft->setCheckOrNot('Commande Refuser');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de Craft archivé.');

        return $this->redirectToRoute('craft_request');
    }

    /**
     * @Route("/craft/{id}/loading", name="craft_loading")
     * @IsGranted("ROLE_CRAFT")
     */
    public function loading(CraftRequest $craft = null): Response
    {
        $user = $this->getUser();
        if(null === $craft)
        {
            throw $this->createNotFoundException('Demande de craft non trouvé.');
        }
        if($craft->getFarmeur() === null){
            $craft->setFarmeur($user->getPseudo());
        }
        else
        {
            $this->addFlash('danger', 'Cette demande est déjà prise.');
        }

        $craft->setCheckOrNot('En Cours de Craft');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de Craft archivé.');

        return $this->redirectToRoute('craft_request');
    }
    
    /**
     * @Route("/craft/{id}/wait", name="craft_trade_waiting")
     * @IsGranted("ROLE_CRAFT")
     */
    public function tradewait(CraftRequest $craft = null): Response
    {

        $craft->setCheckOrNot("En Attente d'échange");

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de Craft archivé.');

        return $this->redirectToRoute('craft_request');
    }

     /**
     * @Route("/craft/{id}/check", name="craft_check")
     * @IsGranted("ROLE_CRAFT")
     */
    public function check(CraftRequest $craft = null): Response
    {
        if(null === $craft)
        {
            throw $this->createNotFoundException('Demande de craft non trouvé.');
        }
        
        $craft->setCheckOrNot('Commande Fini');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de craft archivé.');

        return $this->redirectToRoute('craft_request');
    }


}
