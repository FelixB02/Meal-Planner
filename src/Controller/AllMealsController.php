<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Meal;
use App\Form\MealType;
use App\Repository\MealRepository;
use App\Repository\UserRepository;


class AllMealsController extends AbstractController
{
    #[Route('/all/meals', name: 'app_all_meals')]
    public function index(MealRepository $mealRepository): Response
    {
        return $this->render('all_meals/index.html.twig', [
            'controller_name' => 'HomeController',
            'meals' => $mealRepository->findAll(),
            

        ]);
    }
    #[Route('/all/meals/{filter}', name: 'app_all_filter')]
    public function sort(MealRepository $mealRepository, $filter): Response
    {
        return $this->render('all_meals/index.html.twig', [
            'controller_name' => 'HomeController',
            'meals' => $mealRepository->findBy(['category' => $filter]),
            

        ]);
    }
    #[Route('/all/meals/{id}', name: 'app_meal_detail', methods: ['GET'])]
    public function pickDetail(MealRepository $meal): Response
    {
        return $this->render('all_meals/details.html.twig', [
            'controller_name' => 'HomeController',
            'meal' => $meal,
        ]);
    }
}
