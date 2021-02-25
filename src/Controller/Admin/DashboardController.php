<?php
namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\PelliculaCrudController;
use App\Entity\Editorial;
use App\Entity\Llibre;
use App\Entity\Usuari;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
class DashboardController extends AbstractDashboardController
{
/**
* @Route("/admin", name="admin")
*/
public function index(): Response
{
$routeBuilder = $this->get(AdminUrlGenerator::class);
return $this->redirect($routeBuilder->
setController(LlibreCrudController::class)->generateUrl());
}
public function configureDashboard(): Dashboard
{
return Dashboard::new()->setTitle('Llibres');
}
public function configureMenuItems(): iterable
{
yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
yield MenuItem::linkToCrud('Editorial', 'fas fa-list', Editorial::class);
yield MenuItem::linkToCrud('Llibre', 'fas fa-list', Llibre::class);
yield MenuItem::linkToCrud('Usuari', 'fas fa-list', Usuari::class);
}
}
?>