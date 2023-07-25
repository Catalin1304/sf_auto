<?php

namespace App\Controller;

use App\Entity\CarOrder;
use App\Entity\Vehicle;
use App\Entity\Owner;
use App\Form\OrderFormType;
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


class OrderController extends AbstractController
{
    /**
     * @Route("/orders")
     */
    public function listAction(): Response
    {
        $orderRepository = $this->entityManager->getRepository(CarOrder::class);
        $orders = $orderRepository->findAll();
        return $this->render('main/listorder.html.twig', [
            'orders' => $orders]);
    }

    /**
     * @Route("/addorder")
     */
    public function show(Request $request, EntityManagerInterface $entityManager): Response
    {
        $order = new CarOrder();

        $form = $this->createForm(OrderFormType::class, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($order);
            $entityManager->flush();

            return new Response('Numarul de inmatriculare');
        }

        return $this->render('main/showorder.html.twig', [
            'order_form' => $form->createView(),
        ]);
    }

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}