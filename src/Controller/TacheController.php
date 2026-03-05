<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Tache;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TacheRepository;

final class TacheController extends AbstractController
{
    #[Route('/taches', name:'app_taches')]
    public function afficherAll(TacheRepository $tacheRepository): Response{
        $taches = $tacheRepository->findall();
        return $this->render('tache/index.html.twig', [
            'taches' => $taches,
        ]);
    }

    #[Route('/taches/{id}', name:'app_tache', requirements: ['id' => '\d+'])]
    public function afficherOne(Tache $tache) : Response{
        return $this->render('tache/index.html.twig', [
            'taches' => $tache,
        ]);
    }


    #[Route('/taches/ajouter', name: 'app_tache_add')]
    public function ajouter(EntityManagerInterface $em): Response
    {
        $tache = new Tache();
        $tache->setTitre('Mon premier tache');
        $tache->setDescription('Ceci est le contenu de mon premier tache créé avec Doctrine.');
        $tache->setTerminee(true);
        $tache->setDateCreation(new \DateTime());

        $em->persist($tache);
        $em->flush();

        return new Response("Tache créé avec l'id : " . $tache->getId());

        
    }


}
