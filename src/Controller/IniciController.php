<?php
namespace App\Controller;
use App\Entity\Llibre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Jenssegers\Date\Date;

class IniciController extends AbstractController{

private $llibres;
public function __construct($bdProva)
{
//$this->llibres = $bdProva->get();

}
/**
* @Route("/", name="inici")
*/
public function inici(){
    $repositori = $this->getDoctrine()->getRepository(Llibre::class);
    $llibre = $repositori->findAll();
    Date::setLocale('ca_ES');
    $hui = Date::now();
    $fecha = 'Hui és ' . $hui->format('l jS \of F Y h:i:s A');
    //return $this->render('inici.html.twig', ['fecha' => $fecha]);
    return $this->render('inici.html.twig',
            array('llibre' => $llibre, 'fecha' => $fecha));
}
}
?>