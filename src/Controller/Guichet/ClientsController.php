<?php

namespace App\Controller\Guichet;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{
    /**
     * @Route("/guichet/clients", name="clients")
     */
    public function index(): Response
    {
        return $this->render('Guichet/Clients.html.twig');
    }
}
