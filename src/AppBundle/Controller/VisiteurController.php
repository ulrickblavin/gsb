<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Visiteur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * Description of VisiteurController
 *
 * @author ulrick
 */
class VisiteurController extends Controller{
    /**
     * @Route("/visiteurs/", name="author_show")
     */
    public function VisiteurAction()
    {
       $res = $this->getDoctrine()->getRepository('AppBundle:Visiteur')->findAll();
        $data =  $this->get('serializer')->serialize($res, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        
         if ($response === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
         }

        return $response;
    }
    
    
    /**
     * @Route("/connexion/{vis_login}/{vis_mdp}", name="author_show2")
     */
     public function ConnexionAction($vis_login,$vis_mdp)
    {
       $res = $this->getDoctrine()->getRepository('AppBundle:Visiteur')->findBY(array('visLogin'=>$vis_login,'visMdp'=>$vis_mdp));
        $data =  $this->get('serializer')->serialize($res, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        
         if ($response === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
         }

        return $response;
    }
    }

