<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/administration", name="dashboard")
     */
    public function index(): Response
    {
        return $this->render('Administration/Dashboard.html.twig');
    }
}
