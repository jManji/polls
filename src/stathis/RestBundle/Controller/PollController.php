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
        
    /**
     * Put action
     * @var Request $request
     * @var integer $id Id of the entity
     * @return View|array
     */
    public function putAction(Request $request, $id)
    {
        # Get the poll with the correct id
        $pollEntity = $this->getEntity($id);
        
        # Get the name parameter, the title of the poll option
        $name = $request->get('name');
        
        # Instantiate a new PollOption object, setting the foreign
        # id and name
        $em = $this->getDoctrine()->getManager();
        $entityInfo = $em->getClassMetadata("StathisRestBundle:PollOption");
        $pollOptionEntity = new $entityInfo->name;
        $pollOptionEntity->setPoll($pollEntity);
        $pollOptionEntity->setName($name);
        
        
        $pollEntity->addPollOption($pollOptionEntity);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($pollOptionEntity);
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
    }
    
    
}