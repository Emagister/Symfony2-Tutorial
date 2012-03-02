<?php

namespace Emagister\BannersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AdvertiserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('billing')
            ->add('created_at')
            ->add('updated_at')
            ->add('active')
        ;
    }

    public function getName()
    {
        return 'emagister_bannersbundle_advertisertype';
    }
}
