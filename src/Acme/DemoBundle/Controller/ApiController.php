<?php
namespace Acme\DemoBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use JMS\DiExtraBundle\Annotation\Inject;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\View as RestView;
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
     * @Inject("security.context")
     *
     * @var SecurityContext
     */
    protected $context;

    /**
     * Generated REST url: /api/users
     */
    public function cgetAction()
    {
        return $this->doctrine->getRepository('AcmeDemoBundle:User')->findAll();
    }

    /**
     * @RestView()
     */
    public function meAction()
    {
        return $this->context->getToken()->getUser();
    }
}
