<?php

namespace App\Form\Type;


use App\Entity\Calc;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalcType extends AbstractController
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('calculations' , TextType::class)
        ->add('Oblicz', SubmitType::class );

}
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calc::class,
        ]);

    }
}