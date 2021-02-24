<?php

namespace App\Controller;
use App\Entity\Usuari;
use App\Form\UserType;
use App\Entity\Editorial;
use App\Repository\UsuariRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/usuari", name="usuari")
     */
    public function index(): Response
    {
        $repositori = $this->getDoctrine()->getRepository(Usuari::class);
        $usuaris = $repositori->findAll();

        return $this->render('user/index.html.twig', array('users' => $usuaris));
    }

    /**
     * @Route("/usuari/nou", name="usuarinou")
     */
    public function nouformulari(Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $user = new Usuari();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('usuari');
        }
        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
    * @Route("/usuari/editar/{id}", name="usuarieditar")
    */
    public function editarformulari(Request $request, UserPasswordEncoderInterface $passwordEncoder, $id ){
        $user = $this->getDoctrine()->getRepository(Usuari::class);
        $idusuari = $user->find($id);
        $originalPassword = $idusuari->getPassword();
        $form = $this->createForm(UserType::class, $idusuari);
        $form->get('password')->setData('');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pwd = $form->get('password')->getData();
            if (!empty($pwd))  {
                $password = $passwordEncoder->encodePassword($idusuari, $pwd);
                $idusuari->setPassword($password);               
            }
            else {
                $idusuari->setPassword($originalPassword);
            }
            $idusuari = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($idusuari);
            $em->flush();
            return $this->redirectToRoute('usuari');
        }
        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );}
    /**
    * @Route("/usuari/eliminar/{id}", name="usuarieliminar")
    */
    public function eliminarusuari(Request $request, $id){
        $usuari = $this->getDoctrine()->getRepository(Usuari::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($usuari);
        $entityManager->flush();

        $response = new Response();
        $response->send();

        return $this->redirectToRoute('usuari');

    }
}