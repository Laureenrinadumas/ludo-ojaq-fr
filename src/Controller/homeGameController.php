<?php


namespace App\Controller;

use App\Entity\Game;
use App\Entity\Category;
use App\Repository\GameRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class homeGameController
 * @package App\Controller
 * @Route("")
 */
class homeGameController extends AbstractController
{
    /**
     * @Route("", name="home_game", methods={"GET"})
     * @param GameRepository $gameRepository
     * @return Response
     */
    public function showContent(Request $request, PaginatorInterface $paginator)
    {
        $donnees = $this->getDoctrine()->getRepository(Game::class)->findBy([]);
        $games = $paginator->paginate(
            $donnees, $request->query->getInt('page', 1), 4 );
        return $this->render('homeGame.html.twig', [
           'games' => $games,
        ]);
    }
    public function showByCategory(){

    }
    /**
     * @Route("/contentGame/{id}", name="content_game", methods={"GET"})
     */
    public function showCard(Game $game): Response
    {
        return $this->render('game/show_contentGame.html.twig', [
            'game' => $game,
        ]);
    }
    /**
     * @return Response
     * @Route("management", name="_game", methods={"GET"})
     */
    public function managementContent(){
        return $this->render('management.html.twig');
    }
}
