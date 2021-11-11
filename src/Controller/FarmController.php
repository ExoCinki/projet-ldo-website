<?php

namespace App\Controller;

use DateTime;
use App\Entity\Farm;
use App\Entity\User;
use App\Form\FarmerType;
use App\Repository\FarmRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Null_;
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
        $user = $this->getUser();
        $farm = new Farm();
        $farm->setCheckOrNot('En attente de validation');
        $farm->setCreatedAt(new DateTime());
        $farm->setNameUser($user->getPseudo());
        $formfarm = $this->createForm(FarmerType::class, $farm);
        $formfarm->handleRequest($request);
        
        if ($formfarm->isSubmitted() && $formfarm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($farm);
            $entityManager->flush();

            return $this->redirectToRoute('farm');
        }

        return $this->render('farm/addform.html.twig',['formfarm' => $formfarm->createView()]);
    }

        /**
     * @Route("/farm/{id}/refuser", name="farm_trade_refuser")
     * @IsGranted("ROLE_FARM")
     */
    public function commandrefuser(Farm $farm = null): Response
    {
        
        $farm->setCheckOrNot('Commande Refuser');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de farm archivé.');

        return $this->redirectToRoute('farm');
    }

    /**
     * @Route("/farm/{id}/loading", name="farm_loading")
     * @IsGranted("ROLE_FARM")
     */
    public function loading(Farm $farm = null): Response
    {
        $user = $this->getUser();
        if(null === $farm)
        {
            throw $this->createNotFoundException('Demande de farm non trouvé.');
        }
        if($farm->getFarmeur() === null){
            $farm->setFarmeur($user->getPseudo());
        }
        else
        {
            $this->addFlash('danger', 'Cette demande est déjà prise.');
        }

        $farm->setCheckOrNot('En Cours de Récolte');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de farm archivé.');

        return $this->redirectToRoute('farm');
    }
    /**
     * @Route("/farm/{id}/wait", name="farm_trade_waiting")
     * @IsGranted("ROLE_FARM")
     */
    public function tradewait(Farm $farm = null): Response
    {

        $farm->setCheckOrNot("En Attente d'échange");

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de farm archivé.');

        return $this->redirectToRoute('farm');
    }

     /**
     * @Route("/farm/{id}/check", name="farm_check")
     * @IsGranted("ROLE_FARM")
     */
    public function check(Farm $farm = null): Response
    {
        if(null === $farm)
        {
            throw $this->createNotFoundException('Demande de farm non trouvé.');
        }
        
        $farm->setCheckOrNot('Commande Fini');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash('success', 'Demande de farm archivé.');

        return $this->redirectToRoute('farm');
    }


}
