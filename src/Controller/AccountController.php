<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AccountController extends AbstractController
{
    /**
     * @Route("/connexion", name="account-login")
     */
    public function login(AuthenticationUtils $utils): Response
    {
        $error = $utils->getLastAuthenticationError();
        $username = $utils->getLastUsername();

        return $this->render('account/login.html.twig', [
            "hasError" => $error !== null,
            "username" => $username
        ]);
    }

    /**
     * @Route("/administration/utilisateur", name="list-user")
     */
    public function ListUser(UserRepository $repository)
    {
        $listUser = $repository->findAll();

        return $this->render('Administration/Users.html.twig', [
            "listUsers" => $listUser
        ]);
    }

    /**
     * @Route("/administration/utilisateur/ajout", name="account-register")
     */
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder)
    {
        $addUser = new  User();

        $formUser = $this->createForm(RegistrationType::class, $addUser);
        $formUser->handleRequest($request);

        if ($formUser->isSubmitted() && $formUser->isValid())
        {
            $hash = $encoder->encodePassword($addUser, $addUser->getHash());
            $addUser->setHash($hash);

            $entityManager->persist($addUser);
            $entityManager->flush();

            $this->addFlash('success', "Utilisateur <strong>" . $addUser->getPseudo() . "</strong> enregistrer.");
            return $this->redirectToRoute('list-user');
        }

        return $this->render('account/registration.html.twig', [
            "FormRegistration" => $formUser->createView()
        ]);
    }

    /**
     * @Route("/logout", name="account-logout")
     */
    public function logout()
    {

    }
}
