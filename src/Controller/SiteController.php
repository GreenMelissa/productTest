<?php

namespace App\Controller;

use App\Form\OrderType;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/', name: 'site_')]
class SiteController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, OrderService $service): Response
    {
        $form = $this->createForm(OrderType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('site/index.html.twig', [
                'form' => $form,
                'price' => $service->process($form->getData()),
            ]);
        }

        return $this->render('site/index.html.twig', [
            'form' => $form,
        ]);
    }
}