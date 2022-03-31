<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    /**
     * @Route("/homepage", name="app_main_page")
     */
    public function homepage(): Response
    {
        return $this->render('main_page/index.html.twig', [
            'controller_name' => 'MainPageController',
        ]);
    }

    /**
     * @Route("/home", name="app_signedin_page")
     */
    public function home(): Response
    {
        return $this->render('main_page/signedin.html.twig', [
            'controller_name' => 'MainPageController',
        ]);
    }
}
