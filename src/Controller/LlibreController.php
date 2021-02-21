<?php
namespace App\Controller;
use App\Entity\Llibre;
use App\Entity\Editorial;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LlibreController extends AbstractController{

private $llibres;
public function __construct($bdProva)
{
//$this->llibres = $bdProva->get();

}

        /**
        * @Route("/llibre/inserirAmbEditorial", name="inserir_editorial")
        */
        public function inserirAmbEditorial(){
            $entityManager = $this->getDoctrine()->getManager();
            $editorial = new Editorial();
            $editorial->setNom("Bromera");
            $llibre = new Llibre();
            $llibre->setIsbn("8888TTTT");
            $llibre->setTitol("El teu gust");
            $llibre->setAutor("Isabel Clara Simo");
            $llibre->setPagines(208);
            $llibre->setEditorial($editorial);
            $entityManager->persist($editorial);
            $entityManager->persist($llibre);
            try
            {
            $entityManager->flush();
            return new Response("Llibre amb editorial inserit");
            } catch (\Exception $e) {
            return new Response("Error inserint editorial");
            }
        }
        
        /**
        * @Route("/llibre/{isbn}", name="fitxa_llibre"), requirements={"isbn"="/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/"})
        */
        public function fitxa($isbn)
        {
            $repositori = $this->getDoctrine()->getRepository(Llibre::class);
            $llibre = $repositori->find($isbn);
            if ($llibre){
            return $this->render('fitxa_llibre.html.twig',
            array('llibre' => $llibre));
            }else{
            return $this->render('fitxa_llibre.html.twig',
            array('llibre' => NULL));            
}
        }
        /**
        * @Route("/llibre/pagines/{pagines}", name="nombre_pagines")
        */
    public function buscar($pagines){
    $repositori = $this->getDoctrine()->getRepository(LLibre::class);
    $resultat = $repositori->findByPag($pagines);
    return $this->render('inici.html.twig', array(
    'llibre' => $resultat
    ));
    }

    }
?>