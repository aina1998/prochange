<?php

namespace App\Controller\Administration;

use App\Entity\Exchange;
use App\Form\ExchangeType;
use App\Repository\ExchangeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeRateController extends AbstractController
{
    /**
     * @Route("/administration/cours-de-change", name="exchange")
     */
    public function index(ExchangeRepository $repository): Response
    {
        $ListExchange = $repository->findAll();

        return $this->render('Administration/Exchange.html.twig', [
            'ListExchanges' => $ListExchange
        ]);
    }

    /**
     * @Route("/administration/cours-de-change/imprimer", name="print-exchange")
     */
    public function printExchange(ExchangeRepository $repository)
    {
        $PrintExchange = $repository->findAll();

        return $this->render('Administration/PrintExchange.html.twig', [
            'PrintExchanges' => $PrintExchange
        ]);
    }

    /**
     * @Route("/administration/cours-de-change/ajout", name="add-exchange")
     */
    public function addExchange(Request $request, EntityManagerInterface $entityManager)
    {
        $addExchange = new Exchange();

        $formExchange = $this->createForm(ExchangeType::class, $addExchange);
        $formExchange->handleRequest($request);

        if ($formExchange->isSubmitted() && $formExchange->isValid())
        {
            $entityManager->persist($addExchange);
            $entityManager->flush();

            $this->addFlash('success', "Cour de change <strong>" . $addExchange->getExchangeValue() . " ariary</strong> enregistrer.");
            return $this->redirectToRoute("exchange");
        }

        return $this->render('Administration/FormExchange.html.twig', [
            'FormExchange' => $formExchange->createView()
        ]);
    }
}
