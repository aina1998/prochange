<?php

namespace App\Controller\Guichet;

use App\Entity\Clients;
use App\Form\ClientsType;
use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{
    /**
     * @Route("/guichet/clients", name="clients")
     * @Security("is_granted('ROLE_USER')")
     */
    public function index(ClientsRepository $repository): Response
    {
        $listClient = $repository->findAll();

        return $this->render('Guichet/Clients.html.twig', [
            'listClients' => $listClient
        ]);
    }

    /**
     * @Route("/guichet/clients/ajout", name="add-clients")
     * @Security("is_granted('ROLE_USER')")
     */
    public function addClients(Request $request, EntityManagerInterface $entityManager)
    {
        $addClient = new Clients();

        $formClient = $this->createForm(ClientsType::class, $addClient);
        $formClient->handleRequest($request);

        if ($formClient->isSubmitted() && $formClient->isValid()) {
            $entityManager->persist($addClient);
            $entityManager->flush();

            $this->addFlash('success', "Le client <strong>" . $addClient->getFullName() . "</strong>est enregistré avec succès.");
            return $this->redirectToRoute('clients');
        }

        return $this->render('Guichet/addClients.html.twig', [
            'formClient' => $formClient->createView()
        ]);
    }
}
