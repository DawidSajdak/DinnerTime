<?php

namespace DinnerTime\UserInterface\RestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class RestaurantType
 *
 * @package DinnerTime\UserInterface\RestBundle\Form
 */
class RestaurantType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('restaurantName', 'text');
        $builder->add('streetName', 'text');
        $builder->add('streetNumber', 'text');
        $builder->add('city', 'text');
        $builder->add('country', 'text');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "restaurant_type";
    }
}
