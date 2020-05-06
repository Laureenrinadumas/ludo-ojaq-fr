<?php

namespace App\Controller;

use App\Entity\GamePlay;
use App\Form\GamePlayType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/game/play")
 */
class GamePlayController extends AbstractController
{
    /**
     * @Route("/", name="game_play_index", methods={"GET"})
     */
    public function index(): Response
    {
        $gamePlays = $this->getDoctrine()
            ->getRepository(GamePlay::class)
            ->findAll();

        return $this->render('game_play/index.html.twig', [
            'game_plays' => $gamePlays,
        ]);
    }

    /**
     * @Route("/new", name="game_play_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gamePlay = new GamePlay();
        $form = $this->createForm(GamePlayType::class, $gamePlay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gamePlay);
            $entityManager->flush();

            return $this->redirectToRoute('game_play_index');
        }

        return $this->render('game_play/new.html.twig', [
            'game_play' => $gamePlay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="game_play_show", methods={"GET"})
     */
    public function show(GamePlay $gamePlay): Response
    {
        return $this->render('game_play/show.html.twig', [
            'game_play' => $gamePlay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="game_play_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GamePlay $gamePlay): Response
    {
        $form = $this->createForm(GamePlayType::class, $gamePlay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('game_play_index');
        }

        return $this->render('game_play/edit.html.twig', [
            'game_play' => $gamePlay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="game_play_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GamePlay $gamePlay): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gamePlay->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gamePlay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('game_play_index');
    }
}
