<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListSalesController extends AbstractController
{
    /**
     * @Route("/administration/liste-des-ventes", name="list-sales")
     */
    public function index(): Response
    {
        return $this->render('Administration/ListSales.html.twig');
    }
}
