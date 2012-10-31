<?php
namespace Acme\DemoBundle\Controller;

use JMS\DiExtraBundle\Annotation\Inject;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("User")
 */
 class ApiController implements ClassResourceInterface
{
    
    /**
     * @Inject("doctrine")
     * 
     * @var Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected $doctrine;

    /**
     * Generated REST url: /api/users
     */
    public function cgetAction()
    {
        return $this->doctrine->getRepository('AcmeDemoBundle:User')->findAll();
    }
}
