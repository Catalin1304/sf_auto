<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Entity\Owner;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use App\Form\VehicleFormType;
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

    /**
     * @Route("/show")
     */
    public function show(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vehicle = new Vehicle();

        $form = $this->createForm(VehicleFormType::class, $vehicle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($vehicle);
            $entityManager->flush();

            return new Response('Numarul de inmatriculare' . $vehicle->getPlateNumber() . ' a fost inregistrat');
        }

        return $this->render('main/show.html.twig', [
            'vehicle_form' => $form->createView(),
        ]);
    }

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}