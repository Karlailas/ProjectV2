<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterUserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route ("/register", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param ManagerRegistry $doctrine
     * @return RedirectResponse|Response
     */

    public function registerForm(Request $request, UserPasswordEncoderInterface $passwordEncoder,ManagerRegistry $doctrine)
    {
        $user = new User();
        $form = $this->createForm(RegisterUserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($passwordEncoder->encodePassword($user, $form->get('password')->getdata()));
            $user->setEmail($form->get('email')->getdata());
            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('notice','User was created with ID: ' . $user->getId());
            return $this->redirectToRoute('register');
        }
        return $this->render('registration_form/register.html.twig',[
            'controller_name' => 'RegisterController',
            'form' => $form->createView()]);
    }
}
