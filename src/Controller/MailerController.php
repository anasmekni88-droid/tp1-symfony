<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

// Le nom de la classe doit correspondre EXACTEMENT au nom du fichier
class MailerController extends AbstractController
{
    #[Route('/test-mail', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Nouvel Article !')
            ->text('Un nouvel article a été publié sur le blog.')
            ->html('<p>Un nouvel article a été publié sur le blog.</p>');

        $mailer->send($email);

        return new Response('Email envoyé ! Allez vérifier Mailtrap.');
    }
}