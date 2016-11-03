<?php

namespace Dive\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdherentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name',   'text')
            ->add('Center',   'entity', array(
                'class' => 'DivePlatformBundle:Center',
                'choice_label' => 'Name',
                'multiple' => true,
                'expanded' => true
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
            'data_class' => 'Dive\PlatformBundle\Entity\Adherents'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dive_platformbundle_adherents';
    }
}
