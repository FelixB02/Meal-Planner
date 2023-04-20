<?php

namespace App\Controller;

use App\Entity\Week;
use App\Form\WeekType;
use App\Repository\WeekRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/week')]
class WeekController extends AbstractController
{
    #[Route('/', name: 'app_week_index', methods: ['GET'])]
    public function index(WeekRepository $weekRepository): Response
    {
        return $this->render('week/index.html.twig', [
            'weeks' => $weekRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_week_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WeekRepository $weekRepository): Response
    {
        $week = new Week();
        $form = $this->createForm(WeekType::class, $week);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $weekRepository->save($week, true);

            return $this->redirectToRoute('app_week_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('week/new.html.twig', [
            'week' => $week,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_week_show', methods: ['GET'])]
    public function show(Week $week): Response
    {
        return $this->render('week/show.html.twig', [
            'week' => $week,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_week_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Week $week, WeekRepository $weekRepository): Response
    {
        $form = $this->createForm(WeekType::class, $week);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $weekRepository->save($week, true);

            return $this->redirectToRoute('app_week_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('week/edit.html.twig', [
            'week' => $week,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_week_delete', methods: ['POST'])]
    public function delete(Request $request, Week $week, WeekRepository $weekRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$week->getId(), $request->request->get('_token'))) {
            $weekRepository->remove($week, true);
        }

        return $this->redirectToRoute('app_week_index', [], Response::HTTP_SEE_OTHER);
    }
}
