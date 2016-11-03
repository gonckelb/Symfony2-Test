<?php

namespace Dive\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CenterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name',   'text')
            ->add('City',   'entity', array(
                'class' => 'DivePlatformBundle:City',
                'choice_label' => 'Name',
            ))
            ->add('OK', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dive\PlatformBundle\Entity\Center'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dive_platformbundle_center';
    }
}
