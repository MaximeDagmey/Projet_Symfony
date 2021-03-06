<?php

namespace BU\BibliothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')
            ->add('password')
            ->add('cycle')
            ->add('faculte')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BU\BibliothequeBundle\Entity\User'
        ));
    }
    
    public function setDefaultOptions(OptionResolverInterface $resolver)
{
    $resolver->setDefaults(array(
        'multiple' => false,
    ));
}
}
