<?php

namespace App\Form;

use App\Entity\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('secretText', TextareaType::class, [
                'label' => 'This text will be saved as a secret',
                'attr' => [
                    'placeholder' => 'Secret'
                ]
            ])
            ->add('expiresAt', TextType::class, [
                'label' => 'The secret will not be available after the given time. The value is provided in minutes. 0 means never expires.',
                'attr' => [
                    'placeholder' => 'Expire after'
                ]
            ])
            ->add('remainingViews', TextType::class, [
                'label' => 'The secret will not be available after the given number of views. It must be greater than 0.',
                'attr' => [
                    'placeholder' => 'Expire after views'
                ]
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-2'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Form::class,
        ]);
    }
}
