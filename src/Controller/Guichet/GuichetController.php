<?php

namespace App\Controller\Guichet;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuichetController extends AbstractController
{
    /**
     * @Route("/guichet", name="guichet")
     */
    public function index(): Response
    {
        return $this->render('Guichet/index.html.twig');
    }
}
