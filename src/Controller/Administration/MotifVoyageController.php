<?php

namespace App\Controller\Administration;

use App\Entity\MotifVoyage;
use App\Form\MotifVoyageType;
use App\Repository\MotifVoyageRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotifVoyageController extends AbstractController
{
    /**
     * @Route("/administration/motif-voyage", name="motif-voyage")
     */
    public function index(MotifVoyageRepository $repository): Response
    {
        $listMotifVoyage = $repository->findAll();

        return $this->render('Administration/MotifVoyage.html.twig', [
            'listMotifVoyages' => $listMotifVoyage
        ]);
    }

    /**
     * @Route("/administration/motif-voyage/impression", name="print-motif-voyage")
     */
    public function printMotifVoyage(MotifVoyageRepository $repository): Response
    {
        $printMotifVoyage = $repository->findAll();

        return $this->render('Administration/PrintMotifVoyage.html.twig', [
            'PrintMotifVoyages' => $printMotifVoyage
        ]);
    }

    /**
     * @Route("/administration/motif-voyage/ajout", name="add-motif-voyage")
     */
    public function addMotifVoyage(Request $request, EntityManagerInterface $entityManager)
    {
        $addMotifVoyage = new MotifVoyage();

        $formMotifVoyage = $this->createForm(MotifVoyageType::class, $addMotifVoyage);
        $formMotifVoyage->handleRequest($request);

        if ($formMotifVoyage->isSubmitted() && $formMotifVoyage->isValid())
        {
            $entityManager->persist($addMotifVoyage);
            $entityManager->flush();

            $this->addFlash('success', "Motif de voyage <strong>" . $addMotifVoyage->getMotifVoyageValue() . "</strong> enregistrer.");

            return $this->redirectToRoute('motif-voyage');
        }

        return $this->render('Administration/FormMotifVoyage.html.twig', [
            'FormMotifVoyage' => $formMotifVoyage->createView()
        ]);
    }
}
