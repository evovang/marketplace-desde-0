<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trayecto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrivateController extends Controller
{
   /**
    * @Route("/nuevoTrayecto", name="private_nuevoTrayecto")
    */
   public function nuevoTrayectoAction(Request $request)
   {
       // TODO: Hacer
       return $this->render('nuevoTrayecto/index.html.twig');
   }
  
   /**
    * @Route("/publicarTrayecto", name="private_publicarTrayecto")
    */
   public function publicarTrayectoAction(Request $request)
   {
      $entityManager = $this->getDoctrine()->getManager();
      $repositorioCiudad = $entityManager->getRepository("AppBundle:Ciudad");
      $origen = $repositorioCiudad->findOneByNombre($request->get('origen'));
         if ($origen == null) {
            $origen = new Ciudad();
            $origen->setNombre($request->get('origen'));
            $entityManager->persist($origen);
            $entityManager->flush();
         }

      $destino = $repositorioCiudad->findOneByNombre($request->get('destino'));
         if ($destino == null) {
            $destino = new Ciudad();
            $destino->setNombre($request->get('destino'));
            $entityManager->persist($destino);
            $entityManager->flush();
         }

   $nuevoTrayecto->setOrigen($origen);
   $nuevoTrayecto->setDestino($destino);
      
   return $this->redirect($this->generateUrl('public_home'));
   }
}

