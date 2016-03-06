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
                ->add('description', 'textarea', array(
                    'attr' => array(
                        'style' => "height:150px; resize:none",
                        'class' => 'span8'
                    )
                ))
                ->add('organizationname')
                ->add('availableposition')
                ->add('noofvacancies', 'integer', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'No of Vacancies',
                    'data' => 1,
                    'attr' => array (
                        'min' => 1
                    )
                ))
                ->add('contactname')
                ->add('contactdesignation')
                ->add('contactemail', 'email')
                ->add('contactnumber', 'number')
                ->add('applybeforedate', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Deadline for Applications',
                    'attr' => array(
                        'placeholder' => 'Enter the last for accepting applications',
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