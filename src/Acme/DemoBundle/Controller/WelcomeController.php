<?php

namespace Acme\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Form\FormInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    public function appsAction()
    {
        die('aha');
    }

    /**
     * @Template()
     */
    public function createAppAction()
    {
        $defaultData = array('name' => 'app name');
        $form = $this->createFormBuilder($defaultData)
            ->add('name', 'text')
            ->add('redirect_uri', 'url')
            ->getForm();

        if ($this->getRequest()->isMethod('POST')) {

            $form->bind($this->getRequest());

            if ($form->isValid()) {
                $this->processForm($form);
                return $this->redirect($this->generateUrl('_apps'));
            }
        }

        return array('form' => $form->createView());
    }


    /**
     * @param FormInterface $form
     */
    protected function processForm(FormInterface $form)
    {
        $data = $form->getData();
        $clientManager = $this->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setName($data['name']);
        $client->setRedirectUris(array($data['redirect_uri']));
        $client->setAllowedGrantTypes(array('authorization_code'));
        $client->setUser($this->get('security.context')->getToken()->getUser());
        $clientManager->updateClient($client);

    }
}
