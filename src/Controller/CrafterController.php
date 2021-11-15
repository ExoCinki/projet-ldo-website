<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrafterController extends AbstractController
{
    /**
     * @Route("/crafter", name="crafter")
     * @IsGranted("ROLE_USER")
     */
    public function index(UserRepository $userRepository): Response
    {
        $furnishing = $userRepository->findAllUserFurnishing();
        $craftweapons = $userRepository->findAllUserCraftWeapons();
        $engineering = $userRepository->findAllUserEngineering();
        $jewel = $userRepository->findAllUserJewel();
        $arcana = $userRepository->findAllUserArcana();
        $cooking = $userRepository->findAllUserCooking();
        $armoring= $userRepository->findAllUserArmoring();

        return $this->render('crafter/index.html.twig', [
            'furnishing' => $furnishing,
            'craftweapons'=> $craftweapons,
            'engineering'=> $engineering,
            'jewel'=> $jewel,
            'cooking'=> $cooking,
            'arcana' => $arcana,
            'armoring'=> $armoring
        ]);
    }

    /**
     * @Route("/crafter/transformation", name="crafter_transformation")
     * @IsGranted("ROLE_USER")
     */
    public function transformation(UserRepository $userRepository): Response
    {
        $fonderie = $userRepository->findAllUserFonderie();
        $menuiserie = $userRepository->findAllUserMenuiserie();
        $tannerie = $userRepository->findAllUserTannerie();
        $tissage = $userRepository->findAllUserTissage();
        $tailleurdepierre = $userRepository->findAllUserTailleurDePierre();

        return $this->render('crafter/transformation.html.twig', [
            'fonderie' => $fonderie,
            'menuiserie'=> $menuiserie,
            'tannerie'=> $tannerie,
            'tissage'=> $tissage,
            'tailleurdepierre'=> $tailleurdepierre
        ]);
    }
}
