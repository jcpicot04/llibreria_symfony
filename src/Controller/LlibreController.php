<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LlibreController extends AbstractController{

    private $llibres = array(
        array("isbn" => "A111B3", "titol" => "IT",
        "autor" => "Pepe", "pagines" => 345),
        array("isbn" => "A222B3", "titol" => "Amor",
        "autor" => "Paco", "pagines" => 375),
        array("isbn" => "A333B3", "titol" => "Esa noche",
        "autor" => "Manolo", "pagines" => 445),
        array("isbn" => "A444B3", "titol" => "Desierto nevado",
        "autor" => "Eric", "pagines" => 745),
        array("isbn" => "A555B3", "titol" => "Penumbra",
        "autor" => "Pablo", "pagines" => 645),
        );
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