<?php

namespace App\Controller\Guichet;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuichetController extends AbstractController
{
    /**
     * @Route("/", name="guichet")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        return $this->render('Guichet/index.html.twig');
    }
}
