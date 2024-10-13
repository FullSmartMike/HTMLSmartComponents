<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SmartPagesController extends AbstractController
{
    
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('example.html.twig');
    }

}