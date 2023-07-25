<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Owner;
use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plateNumber')
            ->add('brand', null, [
                'class' => Brand::class,
                'choice_label' => 'name',
            ])
            ->add('owner', null, [
                'class' => Owner::class,
                'choice_label' => 'name',
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
