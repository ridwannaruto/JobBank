<?php

namespace Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PasswordType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder       
                ->add('newpassword','password',array(
                    'attr' => array(
                        'placeholder' => 'type your new password'
                    )
                ))
                ->add('confirmpassword','password',array(
                    'attr' => array(
                        'placeholder' => 'confirm your new password'
                    )
                ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\UserBundle\Entity\Account'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'userbundle_account';
    }

}
