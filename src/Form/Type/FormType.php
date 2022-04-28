<?php

namespace App\Form\Type;


use App\Entity\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function sodium\add;

class FormType extends AbstractType
{
 public function buildForm(FormBuilderInterface $builder, array $options): void
 {
     $builder
         ->add('name', TextType::class)
         ->add('surname', TextType::class)
         ->add('date', DateType::class, [
             'widget' => 'single_text',
])
         ->add('sex', ChoiceType::class, ['choices' => [
             'Man' => 'man',
             'Woman' => 'woman',
             'Undefined' => 'undefined',
         ],
         ])
         ->add('pesel', TextType::class)
         ->add('email', EmailType::class)
         ->add('save', SubmitType::class);



 }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Form::class,
        ]);
    }
}