<?php

namespace Dive\PlatformBundle\Controller;

use Dive\PlatformBundle\Entity\City;
use Dive\PlatformBundle\Entity\Center;
use Dive\PlatformBundle\Entity\Adherents;
use Dive\PlatformBundle\Form\AdherentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Dive\PlatformBundle\Form\CityType;
use Dive\PlatformBundle\Form\CenterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DiveController extends Controller
{
    /*
     * Affiche la page ville
     */
    public function cityAction(Request $request)
    {
        $city = new City();
        // création du formulaire
        $form = $this->createForm(new CityType(), $city);
        // Lien formulaire <-> requete
        $form->handleRequest($request);
         if ($form->isValid()) {
            // hydratation objet city
            $em = $this->getDoctrine()->getManager();
            $em->persist($city);
            $em->flush();
             $this->addFlash('notice', 'OK');
            // redirection page courante après l'envoie du formulaire
            return $this->redirect($this->generateUrl('dive_platform_city'));
        }

        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('DivePlatformBundle:City')->findAll();
        return $this->render('DivePlatformBundle:Dive:city.html.twig', array(
            'form' => $form->createView(),
            'city' => $city,
        ));
    }

    /*
     * Supprime l'entité ville selectionnée
     */
    /**
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function rmcityAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $city = $request->get('city');

            $em = $this->getDoctrine()->getManager();
            $cityrepo = $em->getRepository('DivePlatformBundle:City')->findOneBy(
                array('name' => $city)
            );

            if (!$cityrepo) {
                throw $this->createNotFoundException('No City found for : '.$city);
            }
            $em->remove($cityrepo);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('dive_platform_city'));
    }


    /*
     * Affiche la page centre
     */
    public function centerAction (Request $request)
    {
        $center = new Center();
        // création du formulaire
        $form = $this->createForm(new CenterType(), $center);
        // Lien formulaire <-> requete
        $form->handleRequest($request);
         if ($form->isValid()) {
            // hydratation objet center
            $em = $this->getDoctrine()->getManager();
            $em->persist($center);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'OK');
            // redirection page courante après l'envoie du formulaire
            return $this->redirect($this->generateUrl('dive_platform_center'));
        }
        
        $em = $this->getDoctrine()->getManager();
        $center = $em->getRepository('DivePlatformBundle:Center')->findAll();
        // Affichage page adm
        return $this->render('DivePlatformBundle:Dive:center.html.twig', array(
            'form' => $form->createView(),
            'center' => $center,
        ));
    
    }

    /*
     * Supprime l'entité centre selectionnée
     */
    /**
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function rmcenterAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $center = $request->get('center');

            $em = $this->getDoctrine()->getManager();
            $centerrepo = $em->getRepository('DivePlatformBundle:Center')->findOneBy(
                array('name' => $center)
            );

            if (!$centerrepo) {
                throw $this->createNotFoundException('No center found for : '.$center);
            }
            $em->remove($centerrepo);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('dive_platform_center'));
    }

    /*
     * Affiche la page des adhérents
     */
    public function adherentAction(Request $request)
    {
        $adherent = new Adherents();
        //creation formulaire
        $form = $this->createForm(new AdherentsType(), $adherent);
        // Lien formulaire <-> requete
        $form->handleRequest($request);
         if ($form->isValid()) {
            // hydratation objet adherent
             $em = $this->getDoctrine()->getManager();
             $em->persist($adherent);
             $em->flush();
             $this->addFlash('notice', 'OK');
            // redirection page courante après l'envoie du formulaire
            return $this->redirect($this->generateUrl('dive_platform_adherent'));
        }
        
        $em = $this->getDoctrine()->getManager();
        $adherent = $em->getRepository('DivePlatformBundle:Adherents')->findAll();
        // Affichage page adm
        return $this->render('DivePlatformBundle:Dive:adherent.html.twig', array(
            'form' => $form->createView(),
            'adherent' => $adherent,
        ));
    }

    /*
     * Supprime l'entité adherent selectionnée
     */
    /**
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function rmadherentAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $adherent = $request->get('adherent');
            $em = $this->getDoctrine()->getManager();
            $adherentrepo = $em->getRepository('DivePlatformBundle:Adherents')->findOneBy(
                array('name' => $adherent)
            );

            if (!$adherentrepo) {
                throw $this->createNotFoundException('No adherent found for : '.$adherent);
            }
            $em->remove($adherentrepo);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('dive_platform_adherent'));
    }
}
