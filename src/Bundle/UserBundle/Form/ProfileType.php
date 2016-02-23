<?php

namespace Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username')
         
                ->add('firstname')
                ->add('lastname')
               
                ->add('gender', 'choice', array(
                    'choices' => array(
                        'M' => 'Male',
                        'F' => 'Female'
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('phonenumber')
                ->add('dateofbirth', 'text', array(
                    'label_attr' => array('class' => 'control-label'),
                    'label' => 'Date',
                    'attr' => array(
                        'placeholder' => 'date',
                        'class' => 'input-large datepicker',
                        'data' => \Date('today'),
                    )
                ))
                ->add('namewithinitials')
                ->add('nic')
                ->add('mobilenumber')
         
                ->add('address')
                ->add('city')
                ->add('country')
               
                ->add('department', 'choice', array(
                    'choices' => array(
                        'Chemical and Process Engineering' => 'Chemical and Process Engineering',
			'Civil Engineering' => 'Civil Engineering',
                        'Computer Science & Engineering' => 'Computer Science & Engineering',
			'Earth Resource Engineering' => 'Earth Resource Engineering',
			'Electrical Engineering' => 'Electrical Engineering',
                        'Electronic & Telecommunication Engineering' => 'Electronic & Telecommunication Engineering',
			'Fashion Design'	=> 'Fashion Design',
			'Faculty of Architecture'	=> 'Faculty of Architecture',
			'Faculty of Information Technology' => 'Faculty of Information Technology',
			'Material Engineering' => 'Material Engineering',
                        'Mechanical Engineering' => 'Mechanical Engineering',
			'National Diploma in Technology' => 'National Diploma in Technology',
                        'Textile Engineering'	=>  'Textile Engineering',			
			'Transport and Logistics Management'=> 'Transport and Logistics Management'
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('batch')
                ->add('skills', 'choice', array(
                    'choices' => array(
                        'Video Editing' => 'Video Editing',
                        'Graphic Design' => 'Graphic Design',
                        'Marketing' => 'Marketing',
                        'Team Management' => 'Team Management'
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'multiple data-rel' => "chosen"
                    )
                ))
        ;

        $builder
                ->add('submit', 'submit', array(
                    'label' => 'Register'
        ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\UserBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'entitybundle_profile';
    }

}