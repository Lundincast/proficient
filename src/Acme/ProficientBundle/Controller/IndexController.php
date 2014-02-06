<?php

namespace Acme\ProficientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\ProficientBundle\Form\Type\ContactType;

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
    
    public function contactAction(Request $request, $_locale)
    {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo('thecrazybaldhead15@hotmail.com.com')
                    ->setBody(
                        $this->renderView(
                            'AcmeProficientBundle:Index:emailtemplate.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('proficient_contact_confirmation'));
            }
        }
        
        return $this->render('AcmeProficientBundle:Index:contact.html.twig', array('_locale' => $_locale, 'form' => $form->createView()));

    }
    
    public function langMenuAction($route)
    {
        $lang = array('en' => 'English',
                      'es' => 'Español',
                      'fr' => 'Français',
                      'it' => 'Italiano',
                      'ca' => 'Catalá');
        $local = $this->getRequest()->get('_locale');
        $current = $lang[$local];
        unset($lang[$local]);
        
        return $this->render('AcmeProficientBundle:Index:langMenu.html.twig', 
                array('currentLang' => $current,
                      'routeName'   => $route,
                      'langList'    => $lang));
    }
}
