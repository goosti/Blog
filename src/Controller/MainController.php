<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {

        $articles = [
        [
            'id' => 1,
            'titre' => 'Découvrir Symfony',
            'description_courte' => 'Introduction au framework Symfony',
            'contenu' => 'Symfony est un framework PHP puissant et flexible...',
            'auteur' => 'Admin',
            'date' => '2025-01-01',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 2,
            'titre' => 'Les bases de PHP',
            'description_courte' => 'Comprendre les bases du langage PHP',
            'contenu' => 'PHP est un langage de script côté serveur...',
            'auteur' => 'Jean Dupont',
            'date' => '2025-01-02',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 3,
            'titre' => 'MVC expliqué simplement',
            'description_courte' => 'Comprendre le pattern MVC',
            'contenu' => 'Le modèle MVC sépare la logique métier...',
            'auteur' => 'Marie Claire',
            'date' => '2025-01-03',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 4,
            'titre' => 'Installer Symfony',
            'description_courte' => 'Guide d’installation de Symfony',
            'contenu' => 'Pour installer Symfony, vous devez avoir PHP...',
            'auteur' => 'Admin',
            'date' => '2025-01-04',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 5,
            'titre' => 'Twig pour les débutants',
            'description_courte' => 'Apprendre le moteur de templates Twig',
            'contenu' => 'Twig est utilisé pour séparer le HTML du PHP...',
            'auteur' => 'Alice',
            'date' => '2025-01-05',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 6,
            'titre' => 'Les routes dans Symfony',
            'description_courte' => 'Comprendre le système de routage',
            'contenu' => 'Les routes permettent de lier une URL à un contrôleur...',
            'auteur' => 'Bob',
            'date' => '2025-01-06',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 7,
            'titre' => 'Créer un contrôleur',
            'description_courte' => 'Premiers pas avec les contrôleurs',
            'contenu' => 'Un contrôleur gère la logique de votre application...',
            'auteur' => 'Admin',
            'date' => '2025-01-07',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 8,
            'titre' => 'Doctrine ORM',
            'description_courte' => 'Introduction à Doctrine',
            'contenu' => 'Doctrine est un ORM utilisé par Symfony...',
            'auteur' => 'Claire',
            'date' => '2025-01-08',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 9,
            'titre' => 'Les formulaires Symfony',
            'description_courte' => 'Créer et gérer des formulaires',
            'contenu' => 'Symfony facilite la gestion des formulaires...',
            'auteur' => 'Admin',
            'date' => '2025-01-09',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 10,
            'titre' => 'Sécurité et authentification',
            'description_courte' => 'Gérer les utilisateurs et la sécurité',
            'contenu' => 'La sécurité est un point clé dans Symfony...',
            'auteur' => 'David',
            'date' => '2025-01-10',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 11,
            'titre' => 'Les services Symfony',
            'description_courte' => 'Comprendre les services',
            'contenu' => 'Les services sont au cœur de Symfony...',
            'auteur' => 'Admin',
            'date' => '2025-01-11',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 12,
            'titre' => 'Les événements',
            'description_courte' => 'Système d’événements Symfony',
            'contenu' => 'Les événements permettent de modifier le comportement...',
            'auteur' => 'Emma',
            'date' => '2025-01-12',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 13,
            'titre' => 'API avec Symfony',
            'description_courte' => 'Créer une API REST',
            'contenu' => 'Symfony permet de créer des API performantes...',
            'auteur' => 'Admin',
            'date' => '2025-01-13',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 14,
            'titre' => 'Tests unitaires',
            'description_courte' => 'Tester son application',
            'contenu' => 'Les tests sont essentiels pour un code fiable...',
            'auteur' => 'Lucas',
            'date' => '2025-01-14',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 15,
            'titre' => 'Optimisation des performances',
            'description_courte' => 'Rendre Symfony plus rapide',
            'contenu' => 'Il existe plusieurs techniques pour optimiser...',
            'auteur' => 'Admin',
            'date' => '2025-01-15',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 16,
            'titre' => 'Gestion des erreurs',
            'description_courte' => 'Gérer les exceptions',
            'contenu' => 'Symfony fournit un système avancé de gestion des erreurs...',
            'auteur' => 'Nina',
            'date' => '2025-01-16',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 17,
            'titre' => 'Les bundles',
            'description_courte' => 'Comprendre les bundles Symfony',
            'contenu' => 'Les bundles permettent de structurer votre projet...',
            'auteur' => 'Admin',
            'date' => '2025-01-17',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 18,
            'titre' => 'Déployer une application',
            'description_courte' => 'Mise en production',
            'contenu' => 'Le déploiement est une étape cruciale...',
            'auteur' => 'Olivier',
            'date' => '2025-01-18',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 19,
            'titre' => 'Bonnes pratiques',
            'description_courte' => 'Écrire du code propre',
            'contenu' => 'Respecter les bonnes pratiques améliore la maintenance...',
            'auteur' => 'Admin',
            'date' => '2025-01-19',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 20,
            'titre' => 'Conclusion sur Symfony',
            'description_courte' => 'Résumé et conseils',
            'contenu' => 'Symfony est un excellent choix pour les projets PHP...',
            'auteur' => 'Admin',
            'date' => '2025-01-20',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
    ];


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'articles' => $articles,
        ]);
    }

    // requirements: ['slug' => '[a-z0-9\-]+']

    #[Route('/show/{id}', name: 'app_main_show', requirements: ['id' =>'\d+'], methods: ['GET'])]
    public function show(int $id): Response
    {

        // Si l'id n'est pas entre 1 et 20, on redirige vers la page d'accueil
        if($id <1 || $id > 20){
            // throw $this->createNotFoundException('Article non trouvé');
            throw $this->redirect('app_main');
        }


        $articles = [
        [
            'id' => 1,
            'titre' => 'Découvrir Symfony',
            'description_courte' => 'Introduction au framework Symfony',
            'contenu' => 'Symfony est un framework PHP puissant et flexible...',
            'auteur' => 'Admin',
            'date' => '2025-01-01',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 2,
            'titre' => 'Les bases de PHP',
            'description_courte' => 'Comprendre les bases du langage PHP',
            'contenu' => 'PHP est un langage de script côté serveur...',
            'auteur' => 'Jean Dupont',
            'date' => '2025-01-02',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 3,
            'titre' => 'MVC expliqué simplement',
            'description_courte' => 'Comprendre le pattern MVC',
            'contenu' => 'Le modèle MVC sépare la logique métier...',
            'auteur' => 'Marie Claire',
            'date' => '2025-01-03',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 4,
            'titre' => 'Installer Symfony',
            'description_courte' => 'Guide d’installation de Symfony',
            'contenu' => 'Pour installer Symfony, vous devez avoir PHP...',
            'auteur' => 'Admin',
            'date' => '2025-01-04',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 5,
            'titre' => 'Twig pour les débutants',
            'description_courte' => 'Apprendre le moteur de templates Twig',
            'contenu' => 'Twig est utilisé pour séparer le HTML du PHP...',
            'auteur' => 'Alice',
            'date' => '2025-01-05',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 6,
            'titre' => 'Les routes dans Symfony',
            'description_courte' => 'Comprendre le système de routage',
            'contenu' => 'Les routes permettent de lier une URL à un contrôleur...',
            'auteur' => 'Bob',
            'date' => '2025-01-06',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 7,
            'titre' => 'Créer un contrôleur',
            'description_courte' => 'Premiers pas avec les contrôleurs',
            'contenu' => 'Un contrôleur gère la logique de votre application...',
            'auteur' => 'Admin',
            'date' => '2025-01-07',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 8,
            'titre' => 'Doctrine ORM',
            'description_courte' => 'Introduction à Doctrine',
            'contenu' => 'Doctrine est un ORM utilisé par Symfony...',
            'auteur' => 'Claire',
            'date' => '2025-01-08',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 9,
            'titre' => 'Les formulaires Symfony',
            'description_courte' => 'Créer et gérer des formulaires',
            'contenu' => 'Symfony facilite la gestion des formulaires...',
            'auteur' => 'Admin',
            'date' => '2025-01-09',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 10,
            'titre' => 'Sécurité et authentification',
            'description_courte' => 'Gérer les utilisateurs et la sécurité',
            'contenu' => 'La sécurité est un point clé dans Symfony...',
            'auteur' => 'David',
            'date' => '2025-01-10',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 11,
            'titre' => 'Les services Symfony',
            'description_courte' => 'Comprendre les services',
            'contenu' => 'Les services sont au cœur de Symfony...',
            'auteur' => 'Admin',
            'date' => '2025-01-11',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 12,
            'titre' => 'Les événements',
            'description_courte' => 'Système d’événements Symfony',
            'contenu' => 'Les événements permettent de modifier le comportement...',
            'auteur' => 'Emma',
            'date' => '2025-01-12',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 13,
            'titre' => 'API avec Symfony',
            'description_courte' => 'Créer une API REST',
            'contenu' => 'Symfony permet de créer des API performantes...',
            'auteur' => 'Admin',
            'date' => '2025-01-13',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 14,
            'titre' => 'Tests unitaires',
            'description_courte' => 'Tester son application',
            'contenu' => 'Les tests sont essentiels pour un code fiable...',
            'auteur' => 'Lucas',
            'date' => '2025-01-14',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 15,
            'titre' => 'Optimisation des performances',
            'description_courte' => 'Rendre Symfony plus rapide',
            'contenu' => 'Il existe plusieurs techniques pour optimiser...',
            'auteur' => 'Admin',
            'date' => '2025-01-15',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 16,
            'titre' => 'Gestion des erreurs',
            'description_courte' => 'Gérer les exceptions',
            'contenu' => 'Symfony fournit un système avancé de gestion des erreurs...',
            'auteur' => 'Nina',
            'date' => '2025-01-16',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 17,
            'titre' => 'Les bundles',
            'description_courte' => 'Comprendre les bundles Symfony',
            'contenu' => 'Les bundles permettent de structurer votre projet...',
            'auteur' => 'Admin',
            'date' => '2025-01-17',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 18,
            'titre' => 'Déployer une application',
            'description_courte' => 'Mise en production',
            'contenu' => 'Le déploiement est une étape cruciale...',
            'auteur' => 'Olivier',
            'date' => '2025-01-18',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 19,
            'titre' => 'Bonnes pratiques',
            'description_courte' => 'Écrire du code propre',
            'contenu' => 'Respecter les bonnes pratiques améliore la maintenance...',
            'auteur' => 'Admin',
            'date' => '2025-01-19',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
        [
            'id' => 20,
            'titre' => 'Conclusion sur Symfony',
            'description_courte' => 'Résumé et conseils',
            'contenu' => 'Symfony est un excellent choix pour les projets PHP...',
            'auteur' => 'Admin',
            'date' => '2025-01-20',
            'image' => 'https://picsum.photos/1920/1080?random'
        ],
    ];

        return $this->render('main/show.html.twig',[
            'articles' => $articles,
            'id' => $id
        ]);
    }
}
