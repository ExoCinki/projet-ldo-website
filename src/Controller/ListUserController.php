<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListUserController extends AbstractController
{
    /**
     * @Route("/list/user", name="list_user")
     * @IsGranted("ROLE_USER")
     */
    public function index(UserRepository $userRepository): Response
    {
        $userlistTank = $userRepository->findAllUserByTank();
        $userlistOffTank = $userRepository->findAllUserByOffTank();
        $userlistHeal = $userRepository->findAllUserByHeal();
        $userlistPalaHeal = $userRepository->findAllUserByPalaHeal();
        $userlistMage = $userRepository->findAllUserByMage();
        $userlistDPSDistant = $userRepository->findAllUserByDPSDistant();
        return $this->render('list_user/index.html.twig', [
            'userlistTank' => $userlistTank,
            'userlistOffTank' => $userlistOffTank,
            'userlistHeal' => $userlistHeal,
            'userlistPalaHeal' => $userlistPalaHeal,
            'userlistMage' => $userlistMage,
            'userlistDPSDistant' => $userlistDPSDistant,
        ]);
    }
}
