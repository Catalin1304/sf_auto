<?php

namespace App\Form;

use App\Entity\CarOrder;
use App\Entity\Owner;
use App\Entity\Vehicle;
use App\Entity\Worker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('details')
            ->add('vehicle', null, [
                'class' => Vehicle::class,
                'choice_label' => 'plateNumber',
            ])
            ->add('worker', null, [
                'class' => Worker::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarOrder::class,
        ]);
    }
}
