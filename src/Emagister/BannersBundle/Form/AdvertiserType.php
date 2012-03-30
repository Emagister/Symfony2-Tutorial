<?php

namespace Emagister\BannersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Emagister\BannersBundle\Entity\Advertiser;

class AdvertiserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('billing', 'choice', array(
                                        'choices' => Advertiser::getPaymentOptions(),
                                        ))
            ->add('active')
        ;
    }

    public function getName()
    {
        return 'emagister_bannersbundle_advertisertype';
    }
}
