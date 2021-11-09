<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\CrafterRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrafterController extends AbstractController
{
    /**
     * @Route("/crafter", name="crafter")
     * @IsGranted("ROLE_LDO")
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
}
