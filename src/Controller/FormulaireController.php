<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/formulaire", name="formulaire")
     */    
    public function formToConnect()
    {
    $form = $this->createFormBuilder()
    ->add('login', TextType::class)
    ->add('motDePasse', PasswordType::class)
    ->add('Valider',SubmitType::class)
    ->add('annuler',ResetType::class)
    ->getForm();


    $request = Request::createFromGlobals(); // sauf si en paramètre de la
    //méthode,on a Request $request
    $form->handleRequest($request) ;
    // Le visiteur a appuyé sur le bouton Valider
    if ($form->isSubmitted() && $form->isValid()) {
    $data = $form->getData() ;
    // Traitement du formulaire
    return $this->render('connexion/form_to_connect_submit.html.twig',
    array('data'=>$data));
    }

    // Affichage du formulaire
    return $this->render('connexion/form_to_connect.html.twig',
    ['form'=>$form->createView()]);
    }


}
