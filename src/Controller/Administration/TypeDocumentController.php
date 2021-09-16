<?php

namespace App\Controller\Administration;

use App\Entity\TypeDocument;
use App\Form\DocumentType;
use App\Repository\TypeDocumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeDocumentController extends AbstractController
{
    /**
     * @Route("/administration/type-document", name="type-document")
     */
    public function index(TypeDocumentRepository $repository): Response
    {
        $listTypeDocument = $repository->findAll();

        return $this->render('Administration/TypeDocument.html.twig', [
            'listTypeDocuments' => $listTypeDocument
        ]);
    }

    /**
     * @Route("/administration/type-document/imprimer", name="print-type-document")
     */
    public function printTypeDocument(TypeDocumentRepository $repository): Response
    {
        $printTypeDocument = $repository->findAll();

        return $this->render('Administration/PrintTypeDocument.html.twig', [
            'PrintTypeDocuments' => $printTypeDocument
        ]);
    }

    /**
     * @Route("/administration/type-document/ajout", name="add-type-document")
     */
    public function addTypeDocument(Request $request, EntityManagerInterface $entityManager)
    {
        $addTypeDocument = new TypeDocument();

        $formTypeDocument = $this->createForm(DocumentType::class, $addTypeDocument);
        $formTypeDocument->handleRequest($request);

        if ($formTypeDocument->isSubmitted() && $formTypeDocument->isValid())
        {
            $entityManager->persist($addTypeDocument);
            $entityManager->flush();

            $this->addFlash('success', "Type de document <strong>" . $addTypeDocument->getTypeDocumentValue() . "</strong> enregistrer.");

            return $this->redirectToRoute('type-document');
        }

        return $this->render('Administration/FormTypeDocument.html.twig', [
            'FormTypeDocument' => $formTypeDocument->createView()
        ]);
    }
}
