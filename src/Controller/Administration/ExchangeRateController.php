<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeRateController extends AbstractController
{
    /**
     * @Route("/administration/cours-de-change", name="exchange")
     */
    public function index(): Response
    {
        return $this->render('Administration/Exchange.html.twig');
    }
}
