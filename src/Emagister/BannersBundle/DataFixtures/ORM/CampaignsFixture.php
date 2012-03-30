<?php

namespace Emagister\BannersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Emagister\BannersBundle\Entity\Campaign;

class CampaignsFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $d1 = new \DateTime();
        $d1->modify('+1 year');
        $c1 = new Campaign();
        $c1->setName('Campaign1');
        $c1->setDescription('Desc for C1');
        $c1->setCreatedAt(new \DateTime());
        $c1->setUpdatedAt(new \DateTime());
        $c1->setActiveAt(new \DateTime());
        $c1->setExpireAt($d1);
        $c1->setAdvertiser($this->getReference('adv1'));
        $manager->persist($c1);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}