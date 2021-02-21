<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IniciController extends AbstractController{

private $llibres;
public function __construct($bdProva)
{
$this->llibres = $bdProva->get();

}
/**
* @Route("/", name="inici")
*/
public function inici(){
    return $this->render('inici.html.twig',
            array('llibre' => $this -> llibres));
}
}
?>