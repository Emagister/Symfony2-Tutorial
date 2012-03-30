<?php

namespace Emagister\BannersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CampaignType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('active_at')
            ->add('expire_at')
            ->add('advertiser')
        ;
    }

    public function getName()
    {
        return 'emagister_bannersbundle_campaigntype';
    }
}
