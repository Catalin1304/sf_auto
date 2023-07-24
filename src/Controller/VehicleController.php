<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\FOSUserBundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VehicleController extends AbstractController
{
    /**
     * @Route("/vehicles")
     */
    public function listAction(): Response
    {
        $vehicleRepository = $this->entityManager->getRepository(Vehicle::class);
        $vehicles = $vehicleRepository->findAll();
        return $this->render('main/list.html.twig', [
            'vehicles' => $vehicles]);
    }

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}