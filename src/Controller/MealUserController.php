<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Form\Meal1Type;
use App\Repository\MealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/meal')]
class MealUserController extends AbstractController
{
    #[Route('/', name: 'app_meal_user_index', methods: ['GET'])]
    public function index(MealRepository $mealRepository): Response
    {
        return $this->render('meal_user/index.html.twig', [
            'meals' => $mealRepository->findBy(["fk_user"=>$this->getUser()->getId()]),
        ]);
    }

    #[Route('/new', name: 'app_meal_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MealRepository $mealRepository): Response
    {
        $meal = new Meal();
        $form = $this->createForm(Meal1Type::class, $meal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meal->setApproved(0);
            $meal->setFkUser($this->getUser());
            $mealRepository->save($meal, true);

            return $this->redirectToRoute('app_meal_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('meal_user/new.html.twig', [
            'meal' => $meal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_meal_user_show', methods: ['GET'])]
    public function show(Meal $meal): Response
    {
        return $this->render('meal_user/show.html.twig', [
            'meal' => $meal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_meal_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Meal $meal, MealRepository $mealRepository): Response
    {
        $form = $this->createForm(Meal1Type::class, $meal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mealRepository->save($meal, true);

            return $this->redirectToRoute('app_meal_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('meal_user/edit.html.twig', [
            'meal' => $meal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_meal_user_delete', methods: ['POST'])]
    public function delete(Request $request, Meal $meal, MealRepository $mealRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meal->getId(), $request->request->get('_token'))) {
            $mealRepository->remove($meal, true);
        }

        return $this->redirectToRoute('app_meal_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
