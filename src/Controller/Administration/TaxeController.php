<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaxeController extends AbstractController
{
    /**
     * @Route("/administration/taux-valeur-ajoutee", name="taxe")
     */
    public function index(): Response
    {
        return $this->render('Administration/Taxe.html.twig');
    }
}
