<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array
    $options)
    {
    $builder
    ->add('login', TextType::class)
    ->add('password', TextType::class, array('empty_data' => '','required' => false))
    ->add('email', EmailType::class)
    ->add('rol', null, [
        'required'   => false,
        'empty_data' => 'ROLE_USER',])
    ->add('save', SubmitType::class, array('label' => 'Enviar'));
    }
    }
    ?>