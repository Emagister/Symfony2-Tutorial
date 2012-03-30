<?php

namespace Emagister\BannersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Emagister\BannersBundle\Entity\Advertiser
 *
 * @ORM\Table(name="advertisers")
 * @ORM\Entity(repositoryClass="Emagister\BannersBundle\Entity\AdvertiserRepository")
 */
class Advertiser
{
    const A30DIAS = 10;
    const A60DIAS = 20;
    const TRANSFER = 30;

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
     * @Assert\Regex(pattern="/^[a-z0-9]+$/", message="Name solo puede tener letras y números sin espacios")
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer $billing
     *
     * @ORM\Column(name="billing", type="integer", nullable=true)
     */
    private $billing;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_at;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var ArrayCollection $campaigns
     * @ORM\OneToMany(targetEntity="Campaign", mappedBy="advertiser")
     */
    private $campaigns;

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
     * Set billing
     *
     * @param integer $billing
     */
    public function setBilling($billing)
    {
        $this->billing = $billing;
    }

    /**
     * Get billing
     *
     * @return integer 
     */
    public function getBilling()
    {
        return $this->billing;
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
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param Campaign $campaign
     */
    public function addCampaign(Campaign $campaign)
    {
        $this->campaigns[] = $campaign;
    }

    /**
     * @return ArrayCollection
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * Gets Payment Options
     * @static
     * @return array
     */
    public static function getPaymentOptions()
    {
        return array(
            self::A30DIAS  => 'A 30 días',
            self::A60DIAS  => 'A 60 días',
            self::TRANSFER => 'Transferencia',
        );
    }

    /**
     * @return bool
     * @Assert\True(message="Name y description deben ser diferentes")
     */
    public function isNameDifferentThanDesc()
    {
        return ($this->getName() != $this->getDescription());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}





