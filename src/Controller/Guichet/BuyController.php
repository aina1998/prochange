<?php

namespace App\Controller\Guichet;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{
    /**
     * @Route("/guichet/achats", name="buy")
     */
    public function index(): Response
    {
        return $this->render('Guichet/Buy.html.twig');
    }
}
