<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AccueilController.php',
        ]);
    }
    #[Route('/bonjour/{prenom}', name:'app_bonjour')]
    public function bonjour(string $prenom) : Response{
        return new Response("<h1>Bonjour $prenom ! Bienvenue sur Symfony 7.4</h1>");
    }
    #[Route('/profil/{id}' , name:'app_profil', requirements: ['id'=>'\d'], defaults: ['id'=>1])]
    public function profil(int $id):Response{
        return new Response("<h1>Profil de l'utilisateur n°$id</h1>");
    }
}
