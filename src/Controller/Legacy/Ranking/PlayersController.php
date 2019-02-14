<?php

namespace App\Controller\Legacy\Ranking;

use App\Domain\Message\QueryBus;
use App\Domain\Message\Ranking\GetPlayersByChampionship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PlayersController extends AbstractController
{
    /**
     * @Route("/ranking/players/{championshipId}", name="ranking_players")
     *
     * @param QueryBus $queryBus
     * @return JsonResponse
     */
    public function __invoke(QueryBus $queryBus, int $championshipId)
    {
        $players = $queryBus->query(new GetPlayersByChampionship($championshipId));
        return $this->json($players);
    }
}
