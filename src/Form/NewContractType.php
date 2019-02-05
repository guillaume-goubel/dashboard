<?php

namespace App\Form;

use App\Entity\Sales;
use App\Entity\SaleType;
use App\Entity\User;
use App\Entity\Customer;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Doctrine\ORM\EntityRepository;

class NewContractType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];
        $newCustomerId = $options['newCustomerId'];

        $builder
            ->add('saleZone', TextType::class)
            ->add('createdAt', DateTimeType::class ,array(
                'widget' => 'single_text'
            )) 
            ->add('saleTypes', EntityType::class ,array( 
                'class' => SaleType::class,
                'choice_label' => 'type',
            )) 
            ->add('customers', EntityType::class , array(
                'class' => Customer::class,
                'query_builder'=> function (EntityRepository $er) use ($newCustomerId) {
                    return $er->createQueryBuilder('c')
                        ->andWhere('c.id = :val')
                        ->setparameter('val', $newCustomerId);
                },
                'choice_label' => 'lastName',  
            ))
            ->add('seller', EntityType::class, array(
                'class' => User::class,
                'query_builder'=> function(EntityRepository $er) use ($user) {
                    return $er->createQueryBuilder('u')
                    ->andWhere('u.id = :val')
                    ->setparameter('val', $user);
                },
                'choice_label' => 'userName'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sales::class,
        ]);

        $resolver->setRequired('user');
        $resolver->setRequired('newCustomerId');
    }
}


