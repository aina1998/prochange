<?php

namespace App\Controller\Administration;

use App\Entity\Tva;
use App\Form\TvaType;
use App\Repository\TvaRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaxeController extends AbstractController
{
    /**
     * @Route("/administration/taux-valeur-ajoutee", name="taxe")
     */
    public function index(TvaRepository $repository): Response
    {
        $listTva = $repository->findAll();

        return $this->render('Administration/Taxe.html.twig', [
            'listTvas' => $listTva
        ]);
    }

    /**
     * @Route("/administration/taux-valeur-ajoutee/impression", name="print-taxe")
     */
    public function printTva(TvaRepository $repository): Response
    {
        $printTva = $repository->findAll();

        return $this->render('Administration/PrintTva.html.twig', [
            'printTvas' => $printTva
        ]);
    }

    /**
     * @Route("/administration/taux-valeur-ajoutee/ajout", name="add-taxe")
     */
    public function addTva(Request $request, EntityManagerInterface $entityManager)
    {
        $addTva = new Tva();

        $formTva = $this->createForm(TvaType::class, $addTva);
        $formTva->handleRequest($request);

        if ($formTva->isSubmitted() && $formTva->isValid())
        {
            $entityManager->persist($addTva);
            $entityManager->flush();

            $this->addFlash('success', "Taux de valeur ajoutée <strong>" . $addTva->getTauxValue() . " % </strong> enregistrer.");
            return $this->redirectToRoute("taxe");
        }

        return $this->render('Administration/FormTva.html.twig', [
            'FormTva' => $formTva->createView()
        ]);
    }

    /**
     * @Route("/administration/taux-valeur-ajoutee/{TauxValue}/supprimer", name="delete-taxe")
     */
    public function deleteTypeDocument(Tva $tva, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($tva);
        $entityManager->flush();

        $this->addFlash('success', "Taux de valeur ajoutée supprimmer avec succès.");
        return $this->redirectToRoute('taxe');
    }
}
