<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LlibreController extends AbstractController{

private $llibres;
public function __construct($bdProva)
{
$this->llibres = $bdProva->get();

}
        /**
        * @Route("/llibre/{isbn}", name="fitxa_llibre"), requirements={"isbn"="/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/"})
        */
        public function fitxa($isbn = "A111B3")
        {
        $resultat = array_filter($this->llibres,
        function($llibre) use ($isbn)
        {
        return $llibre["isbn"] == $isbn;
        });
        if (count($resultat) > 0)
        {
            return $this->render('fitxa_llibre.html.twig',
            array('llibre' => array_shift($resultat)));
        }
        else
        return $this->render('fitxa_llibre.html.twig', array(
            'llibre' => NULL));
        }
        
}
?>