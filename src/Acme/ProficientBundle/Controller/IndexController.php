<?php

namespace Acme\ProficientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function mainAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:main.html.twig', array('_locale' => $_locale));
    }
    
    public function presentationAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:presentation.html.twig', array('_locale' => $_locale));
    }
    
    public function languesAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:langues.html.twig', array('_locale' => $_locale));
    }
    
    public function servicesAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:services.html.twig', array('_locale' => $_locale));
    }
    
    public function methodeAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:methode.html.twig', array('_locale' => $_locale));
    }
    
    public function tarifsAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:tarifs.html.twig', array('_locale' => $_locale));
    }
    
    public function empleoAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:empleo.html.twig', array('_locale' => $_locale));
    }
    
    public function ongsAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:ongs.html.twig', array('_locale' => $_locale));
    }
    
    public function contactAction($_locale)
    {
        return $this->render('AcmeProficientBundle:Index:contact.html.twig', array('_locale' => $_locale));
    }
}
