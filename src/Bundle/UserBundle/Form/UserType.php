<?php

namespace Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username')
                ->add('password', 'repeated', array(
    'type' => 'password',
    'invalid_message' => 'The password fields must match.',
    'options' => array('attr' => array('class' => 'password-field')),
    'required' => true,
    'first_options'  => array('label'=>' ','attr'=>array('placeholder'=>'Type your password here')),
    'second_options' => array('label' => ' ','attr'=>array('placeholder'=>'Re-type your password')),
))
                ->add('firstname')
                ->add('lastname')
                ->add('email','email')
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
                ->add('phonenumber','number')
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
                ->add('mobilenumber','number')
                ->add('accesslevel')
                ->add('address')
                ->add('city')
                ->add('country')
                ->add('pillar', 'choice', array(
                    'choices' => array(
                        'Cooperate Development' => 'Cooperate Development',
                        'Marketing Pillar' => 'Marketing Development',
                        'Editorial' => 'Editorial',                        
                        'Fund Raising' => 'Fund Raising',
                        'Human Resource' => 'Human Resource',
                        'News Operation' => 'News Operation',
                        'Organizational Development' => 'Organizational Development',
                        'Technical Pillar' => 'Technical Pillar',
                        'CXOX' => 'CXOX',   
                        'Special Projects' => 'Special Projects',
                        
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
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
			'Transport and Logistics Management'=> 'Transport and Logistics Management',
			'None'=> 'None'
			
                    ),
                    'attr' => array(
                        'class' => 'controls',
                        'data-rel' => 'chosen'
                    )
                ))
                ->add('batch')
                ->add('skills', 'choice', array(
                    'choices' => array(
                        'Videography' => 'Videography',
                        'Photography' => 'Photography',
                        'Graphic Design' => 'Graphic Design',
                        'Marketing' => 'Marketing',
                        'Programming' => 'Programming',
                        'Web Developing' => 'Web Developing',
                        'Web Design' => 'Web Design',
                        'Mobile App Developing' => 'Mobile App Developing',
                        'Video Editing' => 'Video Editing',
                        'Photo Editing' => 'Photo Editing',
                        'Fund Raising' => 'Fund Raising',
                        'Leadership' => 'Leadership',
                        'Editing' => 'Editing',
                        'Article Writing' => 'Article Writing',
                        'Team Management' => 'Team Management',
                        'None' => 'None'
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
            'data_class' => 'Bundle\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'entitybundle_user';
    }

}