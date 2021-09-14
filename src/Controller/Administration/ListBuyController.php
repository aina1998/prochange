<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListBuyController extends AbstractController
{
    /**
     * @Route("/administration/liste-des-achats", name="list-buy")
     */
    public function index(): Response
    {
        return $this->render('Administration/ListBuy.html.twig');
    }
}
