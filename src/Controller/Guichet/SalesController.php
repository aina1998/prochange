<?php

namespace App\Controller\Guichet;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalesController extends AbstractController
{
    /**
     * @Route("/guichet/sales", name="sales")
     */
    public function index(): Response
    {
        return $this->render('Guichet/Sales.html.twig');
    }
}
