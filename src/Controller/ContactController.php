<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Crypto\SMimeEncrypter;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contact(EntityManagerInterface $em, Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();

        /********** Récupération du form de contact, action (génère une URL) et méthode envoi (POST) ************/
        $contactForm = $this->createForm(ContactFormType::class, $contact, [
            'action' => $this->generateUrl('app_contact'),
            'method' => 'POST',
        ]);

        /********* MAJ, processing et validation des données saisies **********/
        $contactForm->handleRequest($request);

        /*********** Si le formulaire est soumis en méthode POST et valide, ses données sont récupérées **************/
        if($contactForm->isSubmitted() && $contactForm->isValid()) {

            $em->persist($contact);
            $em->flush();

            $this->addFlash( "success", "Votre commentaire a bien été enregistré, un email de copie vous sera transmis. 
            Nous reviendrons vers vous prochainement.");

        /*********** Mail de copie post-envoi *************/
        $email = (new TemplatedEmail())
            ->context(['contact' => $contact])
            ->from(new Address('ppcontact@maildrop.cc', 'Paniers-Paris.fr'))
            ->to($contact->getEmail())
            ->subject($contactForm->getName().': Copie de votre Email de contact')
            ->htmlTemplate('contact_email.html.twig');

            $mailer->send($email);

        }

        /************* Le formulaire est réinitialisé post-submit ******************/
        $contactForm = $this->createForm(ContactFormType::class, null, [
            'action' => $this->generateUrl('app_contact'),
            'method' => 'POST',
        ]);

        /************* Affichage email (Twig) **************/
        return $this->render('contact/contact.html.twig', [
            'form' => $contactForm->createView()
        ]);
    }
}

