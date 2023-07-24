<?php

namespace App\Controller;

use App\Entity\FosUser;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\FOSUserBundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function homepage(): Response
    {
//        $fosUserRepository = $this->entityManager->getRepository(FosUser::class)
//           $fosUser = $fosUserRepository->find($id);
//       $name = $fosUser->getUsername();
        $user = $this->getUser();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
//            'name' => $name
        ]);
    }

}


