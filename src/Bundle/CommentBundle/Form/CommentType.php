<?php

namespace Bundle\CommentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('comment', 'textarea', array(
                    'attr' => array(
                        'style' => "height:50px; resize:none",
                        'class' => 'span11',
                        'placeholder' => 'write new comment....')))
                 ->add('project', 'integer')
                ->add('task','integer')
                ->add('submit', 'submit', array(
                    'label' => 'Add Comment'))
               

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\CommentBundle\Entity\Comment'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'commentbundle_comment';
    }

}
