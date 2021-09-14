<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotifVoyageController extends AbstractController
{
    /**
     * @Route("/administration/motif-voyage", name="motif-voyage")
     */
    public function index(): Response
    {
        return $this->render('Administration/MotifVoyage.html.twig');
    }
}
