<?php

namespace App\Controller;
use App\Entity\Llibre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InserirController extends AbstractController
{
    /**
     * @Route("/llibre/inserir", name="inserir")
     */
    public function inserir()
{
/*$entityManager = $this->getDoctrine()->getManager();
$llibre = new Llibre();
$llibre->setIsbn("A444B5");
$llibre->setTitol("El Princesito");
$llibre->setAutor("Raul");
$llibre->setPagines(460);
$entityManager->persist($llibre);
try
{
$entityManager->flush();
return new Response("Objecte inserit");
} catch (\Exception $e) {
return new Response("Error inserint objecte");
}
}*/
$entityManager = $this->getDoctrine()->getManager();
for($i = 0; $i < 4; $i++){
    $llibre = new Llibre();
$llibre->setIsbn("A777B" . $i);
$llibre->setTitol("El Princesito" . $i);
$llibre->setAutor("Raul");
$llibre->setPagines(460);
$entityManager->persist($llibre);
}
try
{
$entityManager->flush();
return new Response("Objecte inserit");
} catch (\Exception $e) {
return new Response("Error inserint objecte");
}


}
}