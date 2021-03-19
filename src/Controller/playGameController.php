<?php


namespace App\Controller;

use App\Entity\Game;
use App\Entity\Category;
use App\Repository\GameRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class playGameController
 * @package App\Controller
 * @Route("", name="home")
 */
class playGameController extends AbstractController
{
    /**
     * @Route("", name="_game", methods={"GET"})
     * @param GameRepository $gameRepository
     * @return Response
     */
    public function showContent(GameRepository $gameRepository)
    {
        return $this->render('homeGame.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }
    public function showByCategory(){

    }
}
