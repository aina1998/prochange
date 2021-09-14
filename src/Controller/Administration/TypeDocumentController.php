<?php

namespace App\Controller\Administration;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeDocumentController extends AbstractController
{
    /**
     * @Route("/administration/type-document", name="type-document")
     */
    public function index(): Response
    {
        return $this->render('Administration/TypeDocument.html.twig');
    }
}
