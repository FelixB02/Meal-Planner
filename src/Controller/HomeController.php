<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Meal;
use App\Form\MealType;
use App\Repository\MealRepository;
use App\Repository\UserRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/all/meals', name: 'app_meal_all')]
    public function meals(MealRepository $mealRepository): Response
    {
        return $this->render('home/meals.html.twig', [
            'controller_name' => 'HomeController',
            'meals' => $mealRepository->findAll(),
            'catMeat' => $mealRepository->findBy(['category' => 'Meat']),
            'catVegan' => $mealRepository->findBy(['category' => 'Vegan']),
            'catVegeterian' => $mealRepository->findBy(['category' => 'Vegeterian']),


            // 'categories' => $mealRepository -> findBy(array('category' => $idList))
        ]);
    }
}
