<?php

namespace App\Controller\Admin;


use App\Entity\User;
use App\Entity\Vehiculos;
use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
                $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();
        
                return $this->redirect($url);
      
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('InikCamper');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Inicio', 'fas fa-home', 'admin');
        yield MenuItem::linkToCrud('User', 'fas fa-map', User::class);
        yield MenuItem::linkToCrud('Vehiculos', 'fas fa-shuttle-van', Vehiculos::class);
        yield MenuItem::linkToCrud('Images', 'fa fa-file-image-o', Images::class);
    }
}