<?php

namespace App\Controller\Ranking;

use App\Domain\Message\QueryBus;
use App\Domain\Message\Ranking\GetRoundsByChampionship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RoundsController extends AbstractController
{
    /**
     * @Route("/ranking/rounds/{championshipId}", name="ranking_rounds")
     *
     * @param QueryBus $queryBus
     * @return JsonResponse
     */
    public function __invoke(QueryBus $queryBus, int $championshipId)
    {
        $rounds = $queryBus->query(new GetRoundsByChampionship($championshipId));
        return $this->json($rounds);
    }
}
