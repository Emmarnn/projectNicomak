<?php

namespace App\Controller;

use App\Entity\Remerciements;
use App\Form\RemerciementsType;
use App\Repository\RemerciementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/remerciements')]
class RemerciementsController extends AbstractController
{
    #[Route('/', name: 'app_remerciements_index', methods: ['GET'])]
    public function index(RemerciementsRepository $remerciementsRepository): Response
    {
        return $this->render('remerciements/index.html.twig', [
            'remerciements' => $remerciementsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_remerciements_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $remerciement = new Remerciements();
        $form = $this->createForm(RemerciementsType::class, $remerciement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($remerciement);
            $entityManager->flush();

            return $this->redirectToRoute('app_remerciements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('remerciements/new.html.twig', [
            'remerciement' => $remerciement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_remerciements_show', methods: ['GET'])]
    public function show(Remerciements $remerciement): Response
    {
        return $this->render('remerciements/show.html.twig', [
            'remerciement' => $remerciement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_remerciements_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Remerciements $remerciement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RemerciementsType::class, $remerciement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_remerciements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('remerciements/edit.html.twig', [
            'remerciement' => $remerciement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_remerciements_delete', methods: ['POST'])]
    public function delete(Request $request, Remerciements $remerciement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$remerciement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($remerciement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_remerciements_index', [], Response::HTTP_SEE_OTHER);
    }
}
