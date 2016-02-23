<?php

namespace Bundle\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('start', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Date',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
                ->add('due', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Date',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
                ->add('manager', 'entity', array(
                    'label' => 'Assign Task To',
                    'class' => 'UserBundle:User',
                    'property' => 'fullName',
                    'label_attr' => array('class' => 'control-label'),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                    
                ))
                
                ->add('description', 'textarea', array(
                    'attr' => array(
                        'style' => "height:150px; resize:none",
                        'class' => 'span8',
                        'placeholder' => 'write a good description for the project')))
                ->add('objectives', 'textarea', array(
                    'attr' => array(
                        'style' => "height:100px; resize:none",
                        'class' => 'span8',
                        'placeholder' => 'clearly mention the objectives of this project')))
                ->add('submit', 'submit', array(
                    'label' => 'Create Project'
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\ProjectBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'projectbundle_project';
    }

}