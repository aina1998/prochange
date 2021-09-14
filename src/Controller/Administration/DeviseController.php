<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeviseController extends AbstractController
{
    /**
     * @Route("/administration/devise", name="devise")
     */
    public function index(): Response
    {
        return $this->render('Administration/Devise.html.twig');
    }
}
