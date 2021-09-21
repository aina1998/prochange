<?php

namespace App\Controller\Guichet;

use App\Entity\Achats;
use App\Entity\Clients;
use App\Form\AchatsType;
use App\Repository\ClientsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{
    /**
     * @Route("/guichet/achats", name="buy")
     * @Security("is_granted('ROLE_USER')")
     */
    public function index(): Response
    {
        return $this->render('Guichet/Buy.html.twig');
    }
}
