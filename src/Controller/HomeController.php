<?php

namespace App\Controller;

use App\Form\SearchForm;
use App\Repository\CakesRepository;
use App\Repository\ShopRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(CakesRepository $cakeRepo, Request $request, ShopRepository $shopRepo): Response
    {
        $cakes = $cakeRepo->findAll();
        $shops = $shopRepo->findAll();

        $form = $this->createForm(SearchForm::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $keyword = $form->get('keyword')->getData();
            $city = $form->get('city')->getData();

            if($keyword != null) {
                $cakes = $cakeRepo->findBySearching($keyword);
                $shops = $shopRepo->findBySearching($keyword, $city);
            } else {
                $cakes = $cakeRepo->findAll();
                $shops = $shopRepo->findAll();
            }
        }
        
        return $this->render('home.html.twig', [
            'cakes' => $cakes,
            'shops' => $shops,
            'form' => $form->createView()
        ]);
    }
}
