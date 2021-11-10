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
        $userlist = $userRepository->findAllUserBySpe();
        return $this->render('list_user/index.html.twig', [
            'userlist' => $userlist,
        ]);
    }
}
