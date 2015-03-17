<?php

namespace stathis\RestBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

class PollController extends FOSRestController implements ClassResourceInterface
{

    /**
     * Collection get action
     * @var Request $request
     * @return array
     *
     * @Rest\View()
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StathisRestBundle:Poll')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Get entity instance
     * @var integer $id Id of the entity
     * @return Poll
     */
    protected function getEntity($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StathisRestBundle:Poll')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find poll entity');
        }

        return $entity;
    }

    /**
     * Get action
     * @var integer $id Id of the entity
     * @return array
     *
     * @Rest\View()
     */
    public function getAction($id)
    {
        $entity = $this->getEntity($id);

        return array(
                'entity' => $entity,
                );
    }
}