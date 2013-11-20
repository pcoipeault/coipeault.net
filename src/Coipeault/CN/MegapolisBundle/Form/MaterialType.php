<?php

namespace Coipeault\CN\MegapolisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MaterialType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
                ->add('price')
                ->add('stock')
                ->add('warehouse')
                ->add('wishlist')
                ->add('saveAndAdd', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Coipeault\CN\MegapolisBundle\Entity\Material'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        
        return 'coipeault_cn_megapolisbundle_material';
    }

}
