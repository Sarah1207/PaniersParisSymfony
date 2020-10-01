<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter", name="app_newsletter")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function newsletter(EntityManagerInterface $em, Request $request, MailerInterface $mailer)
    {
        $newslet = new Newsletter();

        /******** Récupération email newsletter, méthode envoi (POST) *********/
        $newsletForm = $this->createForm(NewsletterFormType::class, $newslet, [
            'method' => 'POST',
        ]);

        /****** MAJ, processing et validation de l'adresse email saisie *******/
        $newsletForm->handleRequest($request);

        /****** Si le formulaire newsletter est soumis en méthode POST et valide, l'adresse email est récupérée et stockée en BDD *******/
        if($newsletForm->isSubmitted() && $newsletForm->isValid()) {

            $em->persist($newslet);
            $em->flush();

            $this->addFlash( "success", "Merci pour votre souscription à notre newsletter, à bientôt sur Paniers-Paris.fr !");

        /************* Mail de newsletter *****************/
            $email = (new TemplatedEmail())
                ->context(['newsletter' => $newslet])
                ->from(new Address('ppcontact@maildrop.cc', 'Paniers-Paris.fr'))
                ->to($newslet->getEmail())
                ->subject('Newsletter Paniers-Paris : ')
                ->htmlTemplate('newsletter.html.twig');

            $mailer->send($email);
        }

        /*********** Le formulaire newsletter est réinitialisé post-submit ************/
        $newsletForm = $this->createForm(NewsletterFormType::class, null, [
            'method' => 'POST',
        ]);

        /************* Affichage newsletter (Twig) **************/
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/newsletter/unsubscribe/{id}", name="newsletter_unsubscribe")
     */
    public function unsubscribeNewsletter(EntityManagerInterface $manager, Request $request, Newsletter $newsletter)
    {
        if($request->get('confirmed') === '1') {
            $manager->remove($newsletter);
            $manager->flush();

            $this->addFlash( "success", "Vous êtes maintenant désabonné à notre newsletter. A bientôt !");

            return $this->redirectToRoute('index');
        }

        /************* Affichage modale désabonnement newsletter (Twig) **************/
        return $this->render('newsletter_unsubscribe.html.twig', [
            'newsletter' => $newsletter
        ]);
    }
}
