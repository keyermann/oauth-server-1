<?php
namespace Acme\DemoBundle\Entity;

use Acme\DemoBundle\Entity\OAuth\AccessToken;
use Acme\DemoBundle\Entity\OAuth\Client;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use JMS\SerializerBundle\Annotation\ExclusionPolicy;
use JMS\SerializerBundle\Annotation\Expose;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ExclusionPolicy("all")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Acme\DemoBundle\Entity\OAuth\Client", mappedBy="user")
     */
    protected $clients;

    /**
     * @ORM\OneToMany(targetEntity="Acme\DemoBundle\Entity\OAuth\AccessToken", mappedBy="user")
     */
    protected $authorizedApps;

    public function __construct()
    {
        parent::__construct();
        $this->clients = new ArrayCollection();
        $this->authorizedApps = new ArrayCollection();
    }

    /**
     * @return Client[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param ArrayCollection $clients
     * @return \Acme\DemoBundle\Entity\User
     */
    public function setClients($clients)
    {
        $this->clients = $clients;
        return $this;
    }

    /**
     * @return boolean
     */
    public function hasClient()
    {
        return count($this->clients) > 0;
    }

    public function getClient()
    {
        return $this->clients[0];
    }

    /**
     * @return AccessToken[]
     */
    public function getAuthorizedApps()
    {
        return $this->authorizedApps;
    }

    /**
     * @param ArrayCollection $authorizedApps
     * @return \Acme\DemoBundle\Entity\User
     */
    public function setAuthorizedApps($authorizedApps)
    {
        $this->authorizedApps = $authorizedApps;
        return $this;
    }
}
