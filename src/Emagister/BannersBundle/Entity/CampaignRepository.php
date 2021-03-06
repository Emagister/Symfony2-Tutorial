<?php

namespace Emagister\BannersBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CampaignRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CampaignRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getCampaignsWithAdvertisers()
    {
        $em = $this->getEntityManager();

        return $em->createQuery('SELECT c, a FROM EmagisterBannersBundle:Campaign c INNER JOIN c.advertiser a')
                  ->getResult();
    }
}