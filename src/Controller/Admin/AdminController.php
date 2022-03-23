<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\Category;
use App\Entity\Technology;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Mon Portfolio')
            /**
             * @todo define a favicon
             */
            ->setFaviconPath('favicon.svg')
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Projets','fas fa-folder', Project::class),
            MenuItem::linkToCrud('Catégories','fas fa-network-wired', Category::class),
            MenuItem::linkToCrud('Technologies','fas fa-globe', Technology::class),
        ];
    }
}

