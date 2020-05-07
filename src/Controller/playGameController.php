<?php


namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class playGameController
 * @package App\Controller
 * @Route("", name="play_")
 */
class playGameController extends AbstractController
{
    /**
     * @Route("/", name="play_game", methods={"GET"})
     * @param GameRepository $gameRepository
     * @return Response
     */
    public function showContent(GameRepository $gameRepository)
    {
        return $this->render('homeGame.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }
}
