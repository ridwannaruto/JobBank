<?php

namespace Bundle\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
              
                ->add('name')
                ->add('type', 'choice', array(
                    'choices' => array(
                        '1' => 'Normal',
                        '2' => 'Important',
                        '3' => 'Can Wait',
                        '4' => 'Urgent'
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('leader', 'entity', array(
                    'label' => 'Assign Task To',
                    'class' => 'UserBundle:User',
                    'property' => 'fullName',
                    'label_attr' => array('class' => 'control-label'),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('project')
                ->add('weight', 'choice', array(
                    'choices' => array(
                        '2' => 'Very Easy',
                        '4' => 'Easy',
                        '6' => 'Normal',
                        '8' => 'Difficult',
                        '10' => 'Hard'
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('description', 'textarea', array(
                    'attr' => array(
                        'style' => "height:150px; resize:none",
                        'class' => 'span8',
                        'placeholder' => 'write a good description for the task')))
                ->add('goals', 'textarea', array(
                    'attr' => array(
                        'style' => "height:100px; resize:none",
                        'class' => 'span8',
                        'placeholder' => 'clearly mention the objectives of this task')))
                ->add('starttimestamp', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Date',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
                ->add('endtimestamp', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Date',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
                ->add('duetimestamp', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Date',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
            
                
                ->add('user', 'entity', array(
                    'label' => 'Assign Task To',
                    'class' => 'UserBundle:User',
                    'property' => 'fullName',
                    'label_attr' => array('class' => 'control-label'),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('project', 'entity', array(
                    'label' => 'Assign Task To',
                    'class' => 'ProjectBundle:Project',
                    'by_reference' => 'id',
                    'property' => 'name',
                    'label_attr' => array('class' => 'control-label'),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
        ;
        $builder
                ->add('submit', 'submit', array(
                    'label' => 'Assign Task'
        ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\TaskBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'taskbundle_task';
    }

}
