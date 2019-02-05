<?php

namespace App\Form;

use App\Entity\Sales;
use App\Entity\SaleType;
use App\Entity\User;
use App\Entity\Customer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EditContractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('saleZone')
            ->add('createdAt', DateTimeType::class ,array(
                'widget' => 'single_text'
            )) 
            ->add('customers', EntityType::class , array(
                'class' => Customer::class,
                'choice_label' => 'lastName'
            ))
            ->add('saleTypes', EntityType::class ,array( 
                'class' => SaleType::class,
                'choice_label' => 'type'
            ))
            ->add('seller', EntityType::class, array(
                'class' => User::class,
                'choice_label' => 'userName'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sales::class,
        ]);
    }
}
