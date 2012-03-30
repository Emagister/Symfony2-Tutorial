<?php

namespace Emagister\BannersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Emagister\BannersBundle\Entity\Advertiser;

class AdvertisersFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Advertiser();
        $a1->setName('Advertiser1');
        $a1->setDescription('Desc for Advertiser1');
        $a1->setCreatedAt(new \DateTime());
        $a1->setUpdatedAt(new \DateTime());
        $a1->setBilling(Advertiser::A30DIAS);
        $a1->setActive(true);
        $manager->persist($a1);
        $this->addReference('adv1', $a1);

        $a2 = new Advertiser();
        $a2->setName('Advertiser2');
        $a2->setDescription('Desc for Advertiser2');
        $a2->setCreatedAt(new \DateTime());
        $a2->setUpdatedAt(new \DateTime());
        $a2->setBilling(Advertiser::A60DIAS);
        $a2->setActive(true);
        $manager->persist($a2);
        $this->addReference('adv2', $a2);

        $a3 = new Advertiser();
        $a3->setName('Advertiser3');
        $a3->setDescription('Desc for Advertiser3');
        $a3->setCreatedAt(new \DateTime());
        $a3->setUpdatedAt(new \DateTime());
        $a3->setBilling(Advertiser::TRANSFER);
        $a3->setActive(true);
        $manager->persist($a3);
        $this->addReference('adv3', $a3);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}