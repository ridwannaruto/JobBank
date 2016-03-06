<?php

namespace Bundle\VacancyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VacancyType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('heading')
                ->add('applybeforedate', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Deadline for Applications',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
                ->add('submit', 'submit', array(
                    'label' => 'Create Vacancy'
                ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\VacancyBundle\Entity\Vacancy'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'vacancybundle_project';
    }

}