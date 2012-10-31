<?php
namespace Acme\DemoBundle\Entity\OAuth;

use Acme\DemoBundle\Entity\User;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="api__client")
 * @ORM\Entity
 *
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;


    /**
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \Acme\DemoBundle\Entity\OAuth\Client
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return \Acme\DemoBundle\Entity\OAuth\Client
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}
