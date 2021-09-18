<?php

namespace App\Controller\Administration;

use App\Entity\Devise;
use App\Form\DeviseType;
use App\Repository\DeviseRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeviseController extends AbstractController
{
    /**
     * @Route("/administration/devise", name="devise")
     */
    public function index(DeviseRepository $repository): Response
    {
        $listDevise = $repository->findAll();

        return $this->render('Administration/Devise.html.twig', [
            'listDevises' => $listDevise
        ]);
    }

    /**
     * @Route("/administration/devise/impression", name="print-devise")
     */
    public function printDevise(DeviseRepository $repository): Response
    {
        $listDevise = $repository->findAll();

        return $this->render('Administration/PrintDevise.html.twig', [
            'listDevises' => $listDevise
        ]);
    }

    /**
     * @Route("/administration/devise/ajout", name="add-devise")
     */
    public function addDevise(Request $request, EntityManagerInterface $entityManager)
    {
        $addDevise = new Devise();

        $formDevise = $this->createForm(DeviseType::class, $addDevise);
        $formDevise->handleRequest($request);

        if ($formDevise->isSubmitted() && $formDevise->isValid())
        {
            $entityManager->persist($addDevise);
            $entityManager->flush();

            $this->addFlash('success', "Devise <strong>" . $addDevise->getDeviseValue() . "</strong> enregistrer.");

            return $this->redirectToRoute('devise');
        }

        return $this->render('Administration/FormDevise.html.twig', [
            'FormDevise' => $formDevise->createView()
        ]);
    }

    /**
     * @Route("/administration/devise/{DeviseValue}/supprimer", name="delete-devise")
     */
    public function deleteDevise(Devise $devise, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($devise);
        $entityManager->flush();

        $this->addFlash('success', "Devise supprimmer avec succès.");
        return $this->redirectToRoute('devise');
    }
}
