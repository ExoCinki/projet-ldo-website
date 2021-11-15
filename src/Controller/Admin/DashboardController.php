<?php

namespace App\Controller\Admin;

use App\Entity\Farm;
use App\Entity\News;
use App\Entity\User;
use App\Entity\Gemme;
use App\Entity\Absence;
use App\Entity\CraftRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/backoffice", name="admin")
     */
    public function index(): Response
    {
        return $this->render('back/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Back - LDO');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Gemmes', 'fas fa-truck', Gemme::class);
        yield MenuItem::linkToCrud('Résumer Réunion', 'far fa-calendar-alt', News::class);
        yield MenuItem::linkToCrud('Farm', 'fas fa-tractor', Farm::class);
        yield MenuItem::linkToCrud('Craft', 'fas fa-drafting-compass', CraftRequest::class);
        yield MenuItem::linkToCrud('Absence', 'fas fa-bed', Absence::class);
    }
}
