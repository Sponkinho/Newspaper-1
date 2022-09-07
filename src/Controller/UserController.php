<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile')]
class UserController extends AbstractController
{
    #[Route('/voir-mon-compte', name: 'show_profile', methods: ['GET'])]
    public function showProfile(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findBy(['author' => $this->getUser()]);

        return $this->render('user/show_profile.html.twig', [
            'articles' => $articles
        ]);
    }// end function showProfile()

}// end class