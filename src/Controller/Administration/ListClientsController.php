<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListClientsController extends AbstractController
{
    /**
     * @Route("/administration/listes-des-clients", name="list-clients")
     */
    public function index(): Response
    {
        return $this->render('Administration/ListClients.html.twig');
    }
}
