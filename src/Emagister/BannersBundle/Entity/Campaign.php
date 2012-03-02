<?php

namespace Emagister\BannersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emagister\BannersBundle\Entity\Campaign
 *
 * @ORM\Table(name="campaigns")
 * @ORM\Entity(repositoryClass="Emagister\BannersBundle\Entity\CampaignRepository")
 */
class Campaign
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var datetime $active_at
     *
     * @ORM\Column(name="active_at", type="datetime")
     */
    private $active_at;

    /**
     * @var datetime $expire_at
     *
     * @ORM\Column(name="expire_at", type="datetime")
     */
    private $expire_at;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @var Advertiser $advertiser
     * @ORM\ManyToOne(targetEntity="Advertiser", inversedBy="campaigns")
     */
    private $advertiser;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set active_at
     *
     * @param datetime $activeAt
     */
    public function setActiveAt($activeAt)
    {
        $this->active_at = $activeAt;
    }

    /**
     * Get active_at
     *
     * @return datetime 
     */
    public function getActiveAt()
    {
        return $this->active_at;
    }

    /**
     * Set expire_at
     *
     * @param datetime $expireAt
     */
    public function setExpireAt($expireAt)
    {
        $this->expire_at = $expireAt;
    }

    /**
     * Get expire_at
     *
     * @return datetime 
     */
    public function getExpireAt()
    {
        return $this->expire_at;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set advertiser
     *
     * @param Advertiser $advertiser
     */
    public function setAdvertiser(Advertiser $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    /**
     * Get advertiser
     *
     * @return Advertiser
     */
    public function getAdvertiser()
    {
        return $this->advertiser;
    }
}