<?php

namespace Coipeault\CN\MegapolisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StepType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('number')
                ->add('outOf')
                ->add('status')
                ->add('createdAt')
                ->add('updatedAt')
                ->add('building')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Coipeault\CN\MegapolisBundle\Entity\Step'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'coipeault_cn_megapolisbundle_step';
    }

}
