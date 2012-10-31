<?php
namespace Acme\DemoBundle\Controller;

use Doctrine\Bundle\DoctrineBundle\Registry;

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
     * @var Registry
     */
    protected $doctrine;

    public function cgetAction()
    {
        return $this->doctrine->getRepository('AcmeDemoBundle:User')->findAll();
    }
}
