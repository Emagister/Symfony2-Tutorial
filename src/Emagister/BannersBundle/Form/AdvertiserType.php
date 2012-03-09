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
